<?php
function conv_hari($hari) {
	include("bhs.ind.php");
	switch($hari){
		case "Sunday":
			echo "$bhs_minggu";
		break;
		case "Monday":
			echo "$bhs_senin";
		break;
		case "Tuesday":
			echo "$bhs_selasa";
		break;
		case "Wednesday":
			echo "$bhs_rabu";
		break;
		case "Thursday":
			echo "$bhs_kamis";
		break;
		case "Friday":
			echo "$bhs_jumat";
		break;
		case "Saturday":
			echo "$bhs_sabtu";
		break;
		default:
			echo "";
		break;		
	}
}

function conv_bln($bln) {
	include("bhs.ind.php");
	switch($bln){
		case "1":
			echo "$bhs_januari";
		break;
		case "2":
			echo "$bhs_februari";
		break;
		case "3":
			echo "$bhs_maret";
		break;
		case "4":
			echo "$bhs_april";
		break;
		case "5":
			echo "$bhs_mei";
		break;
		case "6":
			echo "$bhs_juni";
		break;
		case "7":
			echo "$bhs_juli";
		break;
		case "8":
			echo "$bhs_agustus";
		break;
		case "9":
			echo "$bhs_september";
		break;
		case "10":
			echo "$bhs_oktober";
		break;
		case "11":
			echo "$bhs_nopember";
		break;
		case "12":
			echo "$bhs_desember";
		break;
		default:
			echo "";
		break;		
	}
}

function uploadfileisexist($path,$filename,$height,$width,$nama) {
	global $HTTP_POST_FILES;
	$uploadpath = $path;
	$source = $HTTP_POST_FILES[$filename]['tmp_name'];
	$namafile =  $HTTP_POST_FILES[$filename]['name'];
	$dest = '';
	$ext = '';
	
	if ( ($source != 'none') && ($source != '' )) {
		$imagesize = getimagesize($source);
		switch ( $imagesize[2] ) {
			case 0:
				return "-1";
			break;
			case 1:
				$dest = uniqid($nama);
				$ext = '.gif';
			break;
			case 2:
				$dest = uniqid($nama);
				$ext = '.jpg';
			break;
			case 3:
				$dest = uniqid($nama);
				$ext = '.png';
			break;
		}
		
		if (($imagesize[0] > $width) ||($imagesize[1] > $height)) return 2;
		
		if ( $dest != '' ) { 
			if (! file_exists($uploadpath.$namafile)) {
				$dest = $uploadpath.$namafile;
			} else {
				$nama = $uploadpath.$dest.$ext;
				while (file_exists($nama)) {
					$dest = uniqid('img');
					$nama = $uploadpath.$dest.$ext;
				}
				$namafile = $dest.$ext;
				$dest = $nama;
			}
			
			if ( move_uploaded_file( $source, $dest ) ) {
				return basename($dest);
			} else { 
				return "1";
			}
		}
	} else {
		return "0";
	}
}

function uploadfile($path,$filename,$nama) {
	global $HTTP_POST_FILES;
	$uploadpath = $path;
	$source = $HTTP_POST_FILES[$filename]['tmp_name'];
	$namafile =  $HTTP_POST_FILES[$filename]['name'];
	$dest = '';
	$ext = '';
	echo "";
	
	if ( ($source != 'none') && ($source != '' )) {
		$ext = explode(".",$namafile);
		$dest = $ext[0];
		$ext = ".".$ext[1];
		
		if (! file_exists($uploadpath.$namafile)) {
			$dest = $uploadpath.$namafile;
		} else {
			$nama = $uploadpath.$dest.$ext;
			while (file_exists($nama)) {
				$dest = uniqid('file');
				$nama = $uploadpath.$dest.$ext;
			}
			$namafile = $dest.$ext;
			$dest = $nama;
		}
		
		if ( move_uploaded_file( $source, $dest ) ) {
			return basename($dest);
		} else {
			return "0";
		}
	} else {
		return "0";
	}
}

function quotes($text) {
	$text = str_replace("'", "''", stripslashes($text));
	return ("".$text."");
}

?>