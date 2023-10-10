<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-20</title>
</head>
<body>
    <?php
      $str = "大乱闘";
$filename = "m99.txt";
$fp = fopen($filename, "a");
fwrite($fp, $str.PHP_EOL);
fclose($fp);
echo "書き込み成功";

if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        echo $line . "<br>";
    }
}
    
?>


</body>
</html>