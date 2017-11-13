<html>
<head>
<title>sample</title>
</head>
<body>



<?php
$filename = 'mission 2-2.txt';


//ここからdelete

if (isset($_POST['del'])){
 $delete = ($_POST['name2']."\n");
 $fp = fopen($filename,'a');
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
	fclose($fp);
}

//ここからedit

if (isset($_POST['edit'])){
 $edit=$_POST['name3'];
 $fp = fopen($filename,'a');
 	$file_edit = file($filename);
 	for($j=0; $j<count($file_edit); $j++){
 		$editData=explode("<>",$file_edit[$j]);
 		if($editData[0] == $_POST['name3']){
 			for($h = 0; $h < count($editData); $h++){
 				$simEdit[$h] = trim($editData[$h]);
				echo'<br>';
			}
 		}
	}
	fclose($fp);
}

?>

<form action="" method="POST">
 名前:<br />
 <input type="text" name="name" size="30" value="<?php echo $simEdit[1]; ?>" /><br />
 コメント:<br />
 <textarea name="comment" cols="30" rows="5"><?php echo $simEdit[2]; ?></textarea>
<input type="hidden" name="editContents" value="<?php echo $simEdit[0] ?>">
 <button type="submit" name="action" value="send" >投稿</button><br />
 <br />
 削除番号:<br />
 <input type="text" name="name2" size="30" value="" />
 <input type="submit" name="del" value="削除">
 <br />
 編集番号:<br />
 <input type="text" name="name3" size="30" value=""/>
 <input type="submit" name="edit" value="編集">
</form>

<?php


if (!(""==$_POST['editContents'])){// $_POST['editContents']が空白でないときすなわち編集の時
	$file=file($filename);
	foreach($file as $value){
		$line = explode('<>',$value);
		if($line[0]==1) $fp=fopen($filename,'w');
		else $fp=fopen($filename,'a');
		if($_POST["editContents"]!=$line[0]) fwrite($fp,"$line[0]<>$line[1]<>$line[2]<>$line[3]");	
		else{
			$dt=date('Y-m-d H:i:s');
			fwrite($fp,"$line[0]<>{$_POST["name"]}<>{$_POST["comment"]}<>$dt\n");
		}
		fclose($fp);
	}
}


if (empty($_POST["del"]) && empty($_POST["edit"]) && empty($_POST["editContents"])){
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


$filename = 'mission 2-2.txt';
$lines=file($filename);
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