<?php
	session_start();
	if(isset($_GET['number']))
	{
		if(!empty($_GET['number']))
		{	//get the fact for a number or a year
			if($_GET["value"]=="1")
			{
				$number_url ="http://numbersapi.com/".$_GET['number']."/math?json";
     			$cont=file_get_contents($number_url);
     			$contjson=json_decode($cont);
     			print_r($contjson);
			}
			if($_GET["value"]=="2")
			{
				$number_url ="http://numbersapi.com/".$_GET['number']."/year?json";
     			$cont=file_get_contents($number_url);
     			$contjson=json_decode($cont);
     			print_r($contjson);
			}
			if($_GET["value"]=="3")
			{
				$number_url ="https://cat-fact.herokuapp.com/facts/random?animal=".$_GET['number']."&amount=1";
     			$cont=file_get_contents($number_url);
     			$contjson=json_decode($cont);
     			print_r($contjson);
			}
			//this for send the value to youtube api
			$name = str_replace(" ", "%20", $contjson->text) ;
    		$youtube_url ="https://www.googleapis.com/youtube/v3/search?key=AIzaSyA_76L_psuS5PJ-LMBUMpoXiYl7Or12GAo&q=".$name."&part=snippet&type=video";
     		$cont=file_get_contents($youtube_url)     ;
     		$contjson=json_decode($cont);
     		if(count($contjson->items)==0)
     		{
     			echo "There is no video to show we are sorry";
     		}else{
				 $value= $contjson->items[0]->id->videoId;
				 $_SESSION['vid']=$value;
				 
     			$chanelid=$contjson->items[0]->snippet->channelId;
     			//view video comment

     			$view="https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&key=AIzaSyA_76L_psuS5PJ-LMBUMpoXiYl7Or12GAo&videoId=".$value;

     			$view=file_get_contents($view);
				 $view=json_decode($view);
				 $_SESSION['view']=$view;

     		}
		}
	}
?>