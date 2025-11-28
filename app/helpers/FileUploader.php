<?php
function ImageUpload($file,$by="addPost"){
	//print_r($file);
	 $imagName = time().'_'.$file['postHeaderImg']['name'];

	if ($by == 'addPost') {
	 	if (is_dir(APPROOT.'/public/postImages')) {
	 		$target = APPROOT.'/public/postImages/'.$imagName;
	 	}
	 	else{
	 		mkdir(APPROOT.'/public/postImages');
	 		$target = APPROOT.'/public/postImages/'.$imagName;
	 	}

	 	if(move_uploaded_file($file['postHeaderImg']['tmp_name'],$target)){
	 		return getImage($target);
		}
		else{
			return false;
		}
	}
}

function UploadProfileImage($file){
	$imagName = time().'_'.$file['profImg']['name'];

	if (is_dir(APPROOT.'/public/userImages')) {
 		$target = APPROOT.'/public/userImages/';
 	}
 	else{
 		mkdir(APPROOT.'/public/userImages');
 		$target = APPROOT.'/public/userImages/';
 	}

 	if (is_dir(APPROOT.'/public/userImages/'.$_SESSION['user_name'].'_'.$_SESSION['user_id'])) {
 		$target = APPROOT.'/public/userImages/'.$_SESSION['user_name'].'_'.$_SESSION['user_id'].'/'.$imagName;
 	}
 	else{
 		mkdir(APPROOT.'/public/userImages/'.$_SESSION['user_name'].'_'.$_SESSION['user_id']);
 		$target = APPROOT.'/public/userImages/'.$_SESSION['user_name'].'_'.$_SESSION['user_id'].'/'.$imagName;
 		
 	}

 	if(move_uploaded_file($file['profImg']['tmp_name'],$target)){
 		return getImage($target);
	}
	else{
		return false;
	}
	
}

function getImage($imgPath){
	$img = explode("/",$imgPath);
	$img = end($img);
	return $img;
}

?>