<?php 

function redirect($page)
{
	header("Location:".URLROOT.'/'.$page);
}

function GetImageURLOfUsers($authName,$authId,$path){

	return URLROOT.'/userImages/'.$authName.'_'.$authId.'/'.$path;
}

?>