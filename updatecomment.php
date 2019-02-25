<?php


				session_start();
				echo $_SESSION[''];
				$code=(isset($_GET['code']))?$_GET["code"]:"";
			    $url2="https://www.googleapis.com/oauth2/v4/token";
			    $data_arr2=array(
			        "code" => $code,
			        "client_id" => "408566376030-3t55hqboeng9a1lqoibmrv2pek0i727h.apps.googleusercontent.com",
			        "client_secret" => "rsxKZDhTK0aFO-zUFQw0ehSM",
			        "redirect_uri" =>"http://localhost/Project_API/updatecomment.php",
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

				  $arrayName = array('id' => "AN98Ot48i6acpcSVeaE4H4fG7J8ZVfb4CJNH2bvetBRb",
				  	"snippet.topLevelComment.textOriginal" =>"very good"
				);
				  echo $_SESSION['commentid'];
				  echo json_encode($arrayName);
				  echo $_SESSION['comm'];
		  $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.googleapis.com/youtube/v3/comment",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "DELETE",
		  CURLOPT_POSTFIELDS => "{\"snippet\":{\"id\":\"".$_SESSION['commentid']."\"}}",
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
				echo "<pre>";
		  		print_r($response);
		  		echo "</pre>";
		  		echo "success";

			}		
		
		//header("refresh:2;url=http://localhost/Project_API/");
	
?>