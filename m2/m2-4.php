<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>m2-4</title>
</head>
<body>
   <form action="" method=post>
       <input type="text" name="str">
       <input type="submit" name="submit">
       </form>
    <?php
    $filename = "mission2-4.txt";
         if(!empty($_POST["str"])){
        $str=$_POST["str"];
  $fp = fopen($filename, "a");
  fwrite($fp, $str.PHP_EOL);
  fclose($fp);
    } 
    
    if(file_exists($filename)){
        $lines=file($filename, FILE_IGNORE_NEW_LINES);
        foreach($lines as $line) {
        echo $line."<br>";
        }
    }
?>


</body>
</html>