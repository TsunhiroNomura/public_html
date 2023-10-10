<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>m3-1</title>
</head>
<body>
   <form action="" method=post> 
     <input type="text" name="name">
     <input type="comment" name="str" >
     <input type="submit" name="submit" >
     </form>
     
    <?php
    $filename="m3-1.txt";
    if(!empty($_POST["name"]) && !empty($_POST["str"])){
        $name=$_POST["name"];
        $str=$_POST["str"];
        $date=date("Y/m/d H:i:s");
        
        $lines=file($filename, FILE_IGNORE_NEW_LINES);
        $num=count($lines) + 1;
        
        $fp=fopen($filename,"a");
        fwrite($fp,$num."<>".$name."<>".$str."<>".$date .PHP_EOL);
        fclose($fp);
    }
    if(file_exists($filename)){
        $lines=file($filename, FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
            echo $line."<br>";
        }
    }
    
    
?>


</body>
</html>