<html>
<head>
<title>sample</title>
</head>
<body>
<form action="" method="post">
 名前:<br />
 <input type="text" name="name" size="30" value="" /><br />
 コメント:<br />
 <textarea name="comment" cols="30" rows="5"></textarea>
 <button type="submit" name="action" value="send" >投稿</button><br />
 <br />
 削除番号:<br />
 <input type="text" name="name2" size="30" value="" />
 <input type="submit" name="del" >
</form>


<?php
$filename = 'mission 2-2.txt';
if ($_POST["action"]=="send"){
	$name = ($_POST['name']);
	$comment = ($_POST['comment']);
	$postedAt = date('Y-m-d H:i:s');

	$fp = fopen($filename,'r+');
	$count =0;
	while (fgets($fp) !==false){
   		$count++;
	}
	$next = $count + 1;
	fwrite($fp,$next."<>".$_POST['name']."<>".$_POST['comment']."<>".date('Y-m-d H:i:s')."\n");
	fclose($fp);
}

//ここからdelete

if (isset($_POST['del'])){
 $delete = ($_POST['name2']."\n");
 $fp = fopen($filename,'a');
 fwrite($fp,$delete);
 fclose($fp);
 	$lines = file($filename);
 	for($i=0;$i<count($lines); $i++){
 	$text = explode('<>',$lines[$i]);
		if($text[0] ==($_POST['name2'])){
		array_splice($lines, $i, 1);
        file_put_contents($filename, implode($lines));
        echo ($_POST['name2']."は削除しました。");
        	echo'<br>';
        }

}
}

/*$fp =fopen($filename,'a');*/
$lines = file($filename);
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