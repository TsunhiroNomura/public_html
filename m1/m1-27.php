<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-20</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="num"　 placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
    <?php
     $filename = "m99.txt";
    if(!empty($_POST["num"])){
        $str=$_POST["num"];
  $fp = fopen($filename, "a");
  fwrite($fp, $num.PHP_EOL);
  fclose($fp);
  echo "書き込み成功";
    }
     
     if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
 if($line % 3 == 0 && $line % 5 == 0) {
                echo "FizzBuzz<br>";
            } elseif ($line % 5 == 0) {
                echo "Buzz<br>";
            } elseif ($line % 3 == 0) {
                echo "Fizz<br>";
            } else {
                echo $line . "<br>";
            }
        }
    }
     ?>


</body>
</html>