<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-3</title>
</head>
<body>
    <form action="" method=post>
        <input type="text" name="str">
        <input type="submit" name="submit">
        </form>
    <?php
        $filename = "mission2-3.txt";
         if(!empty($_POST["str"])){
        $str=$_POST["str"];
  $fp = fopen($filename, "a");
  fwrite($fp, $str.PHP_EOL);
  fclose($fp);
  echo"おめでとう";}else{echo"フォームが記入されていません";}
    
     
     
?>


</body>
</html>