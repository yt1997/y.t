<html>
<head>
<title>sample</title>
</head>
<body>
<form action="" method="post">
 –¼‘O:<br />
 <input type="text" name="name" size="30" value="" /><br />
 <input type="submit" value="“o˜^‚·‚é" />

</form>

<?php

$filename = 'kadai1-5.txt';
//echo $filename;


 $name = $_POST['name'];

$fp = fopen($filename,"a");
fwrite($fp, $name."\n");
fclose($fp);

?>

 </body>
 </html>