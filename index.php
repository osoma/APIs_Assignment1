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
			
			//this for send the value to youtube api
			
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
		<input type="text" name="number" placeholder="enter a Number ,a Year Or an animal">
		<br>
		<select name="value">
			<option value="1">number</option>
			<option value="2">Year</option>
			<option value ="3">animal</option>
		</select>
		<input type="submit" value="search">
	</form><br>
<iframe width="959" height="538" src="https://www.youtube.com/embed/<?php if(isset($_SESSION['vid'])){echo $_SESSION['vid'];}else {echo $value;} ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br><br><br>
	<ul>
		<?php
		if(isset($_SESSION['view']))
		{
			for($i=0;$i<count($_SESSION['view']->items);$i++)
			{
				echo "<li>".$_SESSION['view']->items[$i]->snippet->topLevelComment->snippet->textOriginal."</li>";
			}
		}
			
		?>
	</ul>
<form action="authorization.php" method="GET">
		<input type="text" name="comment" placeholder="enter the comment">
		<input type="submit" name="go" value="Enter Comment">
		<input type="text" hidden="hidden" name="vid" value="<?php echo $value?>">
		<input type="text" hidden="hidden" name="cid" value="<?php echo $chanelid?>">
	</form>
	<br>
	<form action="authorization.php" method="GET">
		<input type="text" name="update" placeholder="write 'delete'">
		<input type="submit" name="go" value="DELETE">
		<input type="text" hidden="hidden" name="commentid" value="<?php echo $_SESSION['commentid']?>">
		
	</form>
</body>
</html>