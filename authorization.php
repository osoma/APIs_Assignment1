<?php
	//this for generate access token to post comment on youtube video
session_start();
$url1="";
if(isset($_GET['comment']))
{
	if(!empty($_GET['comment'])){
	$_SESSION['comm']=$_GET['comment'];
	$_SESSION['cid']=$_GET['cid'];
	$_SESSION['vid']=$_GET['vid'];
	$data_arr=array(
    "client_id" => "408566376030-3t55hqboeng9a1lqoibmrv2pek0i727h.apps.googleusercontent.com",
    "redirect_uri" => "http://localhost/Project_API/addcomment.php",
    "include_granted_scopes"=>"true",
    "scope" => "https://www.googleapis.com/auth/youtube.force-ssl",
    "access_type" => "offline",
    "state" =>"state_parameter_passthrough_value",
    "response_type" => "code"
  );
  $url1="https://accounts.google.com/o/oauth2/v2/auth?client_id=".$data_arr["client_id"]
        ."&redirect_uri=".$data_arr["redirect_uri"]."&scope=".$data_arr["scope"]."&access_type=".$data_arr["access_type"]
        ."&response_type=".$data_arr["response_type"]."&state=".$data_arr["state"];
	}
	
}elseif (isset($_GET['update'])) {
	if(!empty($_GET['update'])){
	//$_SESSION['commentid']=$GET['update'];
	$_SESSION['comm']=$_GET['update'];
	
	$data_arr=array(
    "client_id" => "408566376030-3t55hqboeng9a1lqoibmrv2pek0i727h.apps.googleusercontent.com",
    "redirect_uri" => "http://localhost/Project_API/updatecomment.php",
    "include_granted_scopes"=>"true",
    "scope" => "https://www.googleapis.com/auth/youtube.force-ssl",
    "access_type" => "offline",
    "state" =>"state_parameter_passthrough_value",
    "response_type" => "code"
  );
  $url1="https://accounts.google.com/o/oauth2/v2/auth?client_id=".$data_arr["client_id"]
        ."&redirect_uri=".$data_arr["redirect_uri"]."&scope=".$data_arr["scope"]."&access_type=".$data_arr["access_type"]
        ."&response_type=".$data_arr["response_type"]."&state=".$data_arr["state"];
	}
	
}


        
  //if($_SERVER["REQUEST_URI"]==$_SERVER["PHP_REFERER"])
  //{
    header("refresh:10;".$url1);
    
  //}

 

?>