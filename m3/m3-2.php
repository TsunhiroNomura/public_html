<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>m3-2</title>
</head>
<body>
   <form action="" method=post>
       <input type="text" name="str" placeholder="名前">
       <input type="text" name="comment">
       <input type="submit" name="submit">
       </form>
     
      <?php
    $filename = "m3-2.txt";
    if (!empty($_POST["str"]) && !empty($_POST["comment"])) {
        $str = $_POST["str"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $num = count($lines) + 1;
        
        $fp = fopen($filename, "a");
        fwrite($fp, "$num<>$str<>$comment<>$date" . PHP_EOL);
        fclose($fp);
    }
    
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $jama="<>";
            $last=explode($jama,$line);
            foreach ($last as $value){
                echo $value;
            }
            echo"<br>";
        }
    }
    ?>
</body>
</html>