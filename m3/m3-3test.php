<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>m3-2</title>
</head>
<body>
   <form action="" method="post">
       <input type="name" name="str" placeholder="名前">
       <input type="text" name="comment"　placehodier="コメント">
       <input type="submit" name="submit">
       <input type="number" name="deleteNumber">
       <input type="submit" name="submit" value="削除">
   </form>
    <?php
    $filename="m3-3test.txt";
  if(!empty($_POST["str"]) && !empty($_POST["comment"])){
      
      $str=$_POST["str"];
      $comment=$_POST["comment"];
      $date=date("Y/m/d h:i:s");
      $lines=file($filename,FILE_IGNORE_NEW_LINES);  //本来ならブラウザに表示する際に使ってた
      $postNumber=count($lines)+1;
      
      $fp=fopen($filename,"a");
      fwrite($fp,"$postNumber<>$str<>$comment<>$date".PHP_EOL);
      fclose($fp);
      
  }

  
  if(!empty($_POST["deleteNumber"])){
      $filename="m3-3test.txt";
      $deleteNumber=$_POST["deleteNumber"];
      $lines=file($filename,FILE_IGNORE_NEW_LINES);
      $fp=fopen($filename,"w");
      
      foreach($lines as $line){
          $date=explode("<>",$line);
          $jama=$date[0];
          if($deleteNumber!=$jama){
              fwrite($fp,$line.PHP_EOL);
          }elseif($deleteNumber==$jama){
              fwrite($fp,"");
          }
         
      }
       fclose($fp);
  }
  
  
  
$filename="m3-3test.txt";
 if(file_exists($filename)){  
     
         $lines =file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
             echo "<br>".$line;
      }
 }


?>


</body>
</html>