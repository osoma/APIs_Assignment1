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

		}
	}
?>