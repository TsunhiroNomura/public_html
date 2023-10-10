<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>m3-2</title>
</head>
<body>
   <form action="" method=post> 
     <input type="text" name="name" placeholder="名前">
     <input type="text" name="str" placeholder="コメント">
     <input type="submit" name="submit" >
     <input type="text" name="deleteNumber">
     <input type="submit" name="submit" value="削除">
     
     </form>
     
    <?php


 if(!empty($_POST["name"])and!empty($_POST["str"])){
      $name=$_POST["name"];
      $comment=$_POST["str"];
      
     $date =date("Y/m/d h:i:s");
     $filename = "m33.txt";
     $fp = fopen($filename, "a");
     $lines = file($filename,FILE_IGNORE_NEW_LINES);
     $postNumber = count($lines)+1;
     fwrite($fp,"$postNumber<>$name<>$comment<>$date".PHP_EOL);
     fclose($fp); 
 }

 if(!empty($_POST["deleteNumber"])){
      $deleteNumber = $_POST["deleteNumber"];
      
      $filename = "m33.txt";
        $lines =file($filename,FILE_IGNORE_NEW_LINES);
      $fp = fopen($filename, "w");
      
      foreach ($lines as $line){
      $date = explode("<>", $line); 
      $postNumber = $date[0];
      if ($postNumber!= $deleteNumber){
         fwrite($fp,$line.PHP_EOL);
         
   } elseif($date[0] == $deleteNumber)  {
             fwrite($fp, "");
         }
     
 }
     fclose($fp); 
     
 }
 $filename = "m33.txt";
 if(file_exists($filename)){  
         $lines =file($filename,FILE_IGNORE_NEW_LINES);
         foreach($lines as $line){
             echo "<br>".$line;
      }
 }


?>


</body>
</html>