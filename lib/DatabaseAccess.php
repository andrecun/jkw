<?php

/******************************************************************************

     File:          DatabaseAccess.php
     Version:       1.1
     Date:          07/20/2004
     Description:   Database access functions

*******************************************************************************

    Includes:
        None

    Variables:
      
        $connectionID - holds the current connection ID

    Supplied functions:


        OpenDatabase()
                Opens the connection to the database and stores the 
                value in the global variable $connectionID
               
        dbQuery($strSQL)
                Performs the SQL query and returns the query ID if the query
                returns something
     
        dbQueryResult($strSQL)
                Performs the SQL query and returns the single query result
     
        dbQueryArray($strSQL) -- added by cdc
                Performs SQL Query on DB and returns 
                  -  an an 2-Dim array. Each Arrayelement contains one row of the
                     result (one row is an associtive Array of the result)
                  -  FALSE if the result was empty
        
        dbQueryKey($what, $table, $key, $value)
                Selects $what field from the table $table by the key $key
                having the value $value
                
        dbQueryGetRow($strSQL)
                Performs the query and returns the first row from the result
                
        dbQueryGetRowKey($table, $key, $value)
                Selects the first row from the table $table by the key $key
                having the value $value
                
        dbQueryBool($strSQL)
                Returns true if the query has at least one row
                
        dbQueryIterate($strSQL, $iterator_function)
                Performs the query and applies the $iterator_function on each
                row from the result
                
        dbQueryResultIfSuccess($strSQL, &$res)
                Performs the SQL query and returns true if the result has at
                least one row and sets $res to this result. Otherwise returns
                false and sets $res to ""

        dbQueryGetRowIfSuccess($strSQL, &$res)
                Performs the SQL query and returns true if the result has at
                least one row and sets $res to the first row of the result.
                Otherwise returns false and sets $res to ""
                
        dbQueryFetchResult($strSQL)
                Returns the result of the query as an array of hashes

        dbQueryIterateMem($strSQL, $iterator_function_m, &$memory)
                Performs the query and applies the $iterator_function_m on each
                row from the result. $memory is supplied as 2nd argument
                to $iterator_function_m
                
        dbEscape($str)
                Escapes the string $str in order to use it in queries

        dbCount($what, $table, $key, $value)
               Record count  with condition

        dbCountAll($what, $table)
               Record count  
                
*******************************************************************************/



class DatabaseAccess {
	var $cfgSQLDataSource;
	var $cfgSQLDataBase;
	var $cfgSQLUsername;
	var $cfgSQLPasswd;
	var $connectionID;
	
	function openDatabase(){
		global $server, $db_user, $db_pass, $database;
	
		$this->cfgSQLDataSource = $server;
	 	$this->cfgSQLUsername = $db_user;
	 	$this->cfgSQLPasswd = $db_pass;
	 	$this->cfgSQLDataBase = $database;
	   	
	 	
	   	
	 	if (!$this->connectionID){
	      	$this->connectionID = mysql_connect($this->cfgSQLDataSource, $this->cfgSQLUsername, $this->cfgSQLPasswd);
	      	$bCheck = @mysql_select_db($this->cfgSQLDataBase, $this->connectionID);
	      	// if connection failed
	      	if(!$this->connectionID){   
	         	echo "Connection to SQL-Server $this->cfgSQLDataSource failed";
	         	exit;
	      	}
	   
	      	if(!$bCheck){   
	         	echo "Connection to database $this->cfgSQLDataBase failed";
	         	exit;
	      	}
	   
	   	}
	   	return $this->connectionID;
	}

	
	function closeDatabase(){
		mysql_close($this->openDatabase());
	}
	
	function dbQuery($strSQL, $bDisplayError=false) {

  		//global $connectionID;
  		$res = @mysql_query($strSQL, $this->connectionID); 
  		if ($bDisplayError){
      		echo(mysql_error());
    	}
  		return $res;

	}


	function dbQueryArray($strSQL,$bDebug=false){
    	//global $connectionID;
    	$aReturn = array(); $bResultFound = false;
    	$res = mysql_query($strSQL, $this->connectionID);
    	if ($bDebug){
        	$sError = mysql_error();
        	if ($sError != ""){
            	echo("$strSQL <br>---> $sError<br>");
        	}
      	}
    	while ($aRes = mysql_fetch_assoc($res)){
        	$aReturn[]=$aRes;
        	$bResultFound = true;
      	} 
    	@mysql_free_result ($res);
    	if ($bResultFound){
	        return $aReturn;
      	} else {
        	return FALSE;
      	}
  	}
  
	function dbQueryResult($strSQL) {

  		$qresult = $this->dbQuery($strSQL);
  		$res = @mysql_result($qresult, 0);
  		@mysql_free_result ($qresult);
  		return $res;

	}


	function dbQueryKey($what, $table, $key, $value) {
  		$strSQL = "SELECT $what 
             		FROM $table 
             		WHERE $key='$value'";

  		$res = $this->dbQueryResult($strSQL);
  		return $res;
	}

	function dbQueryGetRow($strSQL) {

  		$qresult = $this->dbQuery($strSQL);
  		$res = @mysql_fetch_array($qresult);
  		@mysql_free_result ($qresult);
  		return $res;
	}

	function dbQueryGetRowKey($table, $key, $value) {

  		$strSQL = "SELECT *
             		FROM $table 
             		WHERE $key='$value'";

  		$res = $this->dbQueryGetRow($strSQL);
  		return $res;
	}

	function dbQueryBool($strSQL) {

  		$qresult = $this->dbQuery($strSQL);
  		$num = @mysql_num_rows($qresult);
  		@mysql_free_result ($qresult);
  		if ($num>0) return TRUE;
  		else return FALSE;
	}

	function dbQueryIterate($strSQL, $iterator_function) {

  		$qresult = $this->dbQuery($strSQL);
  		while ($row = mysql_fetch_array ($qresult)) {
    		$iterator_function($row);
  		};  
  		mysql_free_result ($qresult);
	}

	function dbQueryResultIfSuccess($strSQL, &$res) {
  		$qresult = $this->dbQuery($strSQL);
  		if (@mysql_num_rows($qresult)) {
    		$res = @mysql_result($qresult, 0);
    		@mysql_free_result ($qresult);
    		return TRUE;
  		} else {
  			$res=""; 
  			return FALSE;
  		}
	}

	function dbQueryGetRowIfSuccess($strSQL, &$res) {
  		$qresult = $this->dbQuery($strSQL);
  		if (@mysql_num_rows($qresult)) {
    		$res = @mysql_fetch_array($qresult);
    		@mysql_free_result ($qresult);
    		return TRUE;
  		} else {
  			$res=""; 
  			return FALSE;
  		}
	}

	function dbQueryFetchResult($strSQL) {
  		$res = array();
  		$qresult = $this->dbQuery($strSQL);
  		while ($row = mysql_fetch_array ($qresult)) {
    		$res[] = $row;
  		};
 	 	mysql_free_result ($qresult);
  		return $res;
	}
	
	function dbEscape($str) {
	  	return mysql_escape_string($str);
	}
	
	function dbCount($what, $table, $key, $value){
	  	$strSQL = "SELECT $what
	             	FROM $table
	             	WHERE $key='$value'";
	
	  	$qresult = $this->dbQuery($strSQL);
	  	$num = @mysql_num_rows($qresult);
	  	@mysql_free_result ($qresult);
	  	return $num;
	}
	
	function dbCountQuery($strSQL){
	  	$qresult = $this->dbQuery($strSQL);
	  	$num = @mysql_num_rows($qresult);
	  	@mysql_free_result ($qresult);
	  	return $num;
	}
	
	function dbCountAll($what, $table){
	  	$strSQL = "SELECT $what
	             	FROM $table";
	
	  	$qresult = $this->dbQuery($strSQL);
	  	$num = @mysql_num_rows($qresult);
	  	@mysql_free_result ($qresult);
	  	return $num;
	}
	
	function dbGetId(){
		$qresult = mysql_insert_id();
		return  $qresult;
	}
	
}

$objconn = new DatabaseAccess();
$objconn->openDatabase();


?>
