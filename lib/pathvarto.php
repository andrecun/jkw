<?php
class PathVarTo {
	var $pathinfo;
	var $ispathinfo;
	var $pathphpself;
	var $arraypathinfo;
	var $varpathvarto;
	var $arrayvarpathvarto;

	function PathVarTo() {
		$this->arrayvarpathvarto = array();
		$this->ispathinfo = false;
		if(isset($_SERVER['PATH_INFO'])) {
			$this->pathinfo = $_SERVER['PATH_INFO'];
			$this->ispathinfo = true;
			//echo $this->pathinfo = $_SERVER['PATH_INFO'];
		}
		$this->pathphpself = $_SERVER["SCRIPT_NAME"];
		//$this->pathphpself = str_replace("/index.php","",$this->pathphpself);
		$this->generateArray();
	}

	function addPathVarTo($addpath,$reset=false) {
		if ($reset) $this->arrayvarpathvarto = array();
		array_push($this->arrayvarpathvarto,$addpath);
	}
	function getPathVarTo($rmrslash=false,$isreplace=false,$contentreplace="",$withreplace="") {
		$this->varpathvarto = "/";
		for($i=0;$i<count($this->arrayvarpathvarto);$i++) 
		if(!empty($this->arrayvarpathvarto[$i])) {
			$this->varpathvarto = $this->varpathvarto.$this->arrayvarpathvarto[$i]."/";
		}
		if($rmrslash) $this->varpathvarto = rtrim($this->varpathvarto,"/");
		if($isreplace) {
			return str_replace($contentreplace,$withreplace,$this->pathphpself.$this->varpathvarto);
		} else
			return $this->pathphpself.$this->varpathvarto;
			
	}
	function generateArray() {
		if($this->ispathinfo)
		$this->arraypathinfo = explode("/",$this->pathinfo);
		if(count($this->arraypathinfo)<2) {
			$this->ispathinfo = false;
			$this->arraypathinfo = array();
		} else {
			if(empty($this->arraypathinfo[0])) array_shift($this->arraypathinfo);
			if(empty($this->arraypathinfo[count($this->arraypathinfo)-1])) array_pop($this->arraypathinfo);
		}
		if($this->arraypathinfo) $a=1;
		//echo "<pre>";
		//print_r($this->arraypathinfo);
	}

	function getByArray($array) {
		if($array < $this->CountPathVarTo()) return $this->arraypathinfo[$array];
		return false;
	}

	function isPathVarTo() {
		return $this->ispathinfo;
	}
	function CountPathVarTo() {
		return count($this->arraypathinfo);
	}
	function isValidPath($regex) {
		return eregi($regex,$this->pathinfo);
	}
	function Reset() {
	}
}

$clsPath = new PathVarTo();
?>