<?php


				session_start();
				$code=(isset($_GET['code']))?$_GET["code"]:"";
			    $url2="https://www.googleapis.com/oauth2/v4/token";
			    $data_arr2=array(
			        "code" => $code,
			        "client_id" => "408566376030-3t55hqboeng9a1lqoibmrv2pek0i727h.apps.googleusercontent.com",
			        "client_secret" => "rsxKZDhTK0aFO-zUFQw0ehSM",
			        "redirect_uri" =>"http://localhost/Project_API/addcomment.php",
			        "grant_type" => "authorization_code"
			      );
			  $curl=curl_init();
			  curl_setopt($curl,CURLOPT_URL,$url2);
			  curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
			  curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			  curl_setopt($curl,CURLOPT_POST,true);
			  curl_setopt($curl,CURLOPT_POSTFIELDS,$data_arr2);
			  $result1 = curl_exec($curl);
			  if($result1===FALSE)
			  {
			      echo "cURL ERROR".curl_error($curl);
			  }
			   $result1=json_decode($result1);
				  echo "<pre>";
				  print_r($result1);
				  echo "</pre>";
				  curl_close($curl);

		/////////////////////////////////////////////////////////////////////////////////////

		  $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.googleapis.com/youtube/v3/commentThreads?part=snippet",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"snippet\":{\"channelId\":\"".$_SESSION['cid']."\",\"topLevelComment\":{\"snippet\":{\"textOriginal\":\"".$_SESSION['comm']."\"}},\"videoId\": \"".$_SESSION['vid']."\"}}",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: OAuth ".$result1->access_token,
		    "cache-control: no-cache"
		  		),
			));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
			if ($err) {
		  		echo "cURL Error #:" . $err;
			} else {
		  		echo "success";
		  		echo "<pre>";
		  		print_r($response);
		  		echo "</pre>";
		  		$response=json_decode($response);
				$_SESSION['commentid']=$response->id;
			}		
		
		header("refresh:2;url=http://localhost/Project_API/");
	
?>