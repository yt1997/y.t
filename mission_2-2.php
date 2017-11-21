<html>
<head>
<title>sample</title>
</head>
<body>
<form action="" method="post">
 –¼‘O:<br />
 <input type="text" name="name" size="30" value="" /><br />
 ƒRƒƒ“ƒg:<br />
 <textarea name="comment" cols="30" rows="5"></textarea><br />
 <br />
 <input type="submit" value="“o˜^‚·‚é" />

</form>


<?php

$filename = 'mission 2-2.txt';


if ($_SERVER['REQUEST_METHOD'] == 'POST') 

{

	$name = ($_POST['name']);
	$comment = ($_POST['comment']);
	$postedAt = date('Y-m-d H:i:s');
	$newData ="<>".$name."<>".$comment."<>".$postedAt."\n";


	$fp = fopen($filename,'a');
	fclose($fp);

}

$fp =fopen('mission 2-2.txt','r+');

$count =0;
while (fgets($fp) !==false) {
   $count++;
}

$next = $count + 1;
fwrite($fp,$next.$newData);

fclose($fp);

?>


 </body>
 </html>