<html>
<head>
<title>sample</title>
</head>
<body>
<form action="" method="post">
 ñºëO:<br />
 <input type="text" name="name" size="30" value="" /><br />
 ÉRÉÅÉìÉg:<br />
 <textarea name="comment" cols="30" rows="5"></textarea><br />
 <br />
 <input type="submit" value="ìoò^Ç∑ÇÈ" />

</form>


<?php

$filename = 'mission 2-2.txt';


if ($_SERVER['REQUEST_METHOD'] == 'POST') 

{

	$name = ($_POST['name']);
	$comment = ($_POST['comment']);
	$postedAt = date('Y-m-d H:i:s');
	$newData ="<>".$name."<>".$comment."<>".$postedAt."\n";

}


$fp =fopen('mission 2-2.txt','r+');


$count =0;
while (fgets($fp) !==false) {
   $count++;
}

$next = $count + 1;
fwrite($fp,$next."<>".$_POST['name']."<>".$_POST['comment']."<>".date('Y-m-d H:i:s')."\n");
fclose($fp);


$lines = file('mission 2-2.txt');
for($i=0 ;$i<count($lines);$i++){
	$text = explode('<>',$lines[$i]);

	for($j=0 ;$j<count($text);$j++){
		echo($text[$j].' ');

	}
	echo'<br>';
}


 
?>

 </body>
 </html>