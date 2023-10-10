<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_4-1</title>
</head>
<body>
    <?php
   
    // 【サンプル】
    // ・データベース名：tb219876db
    // ・ユーザー名：tb-219876
    // ・パスワード：ZzYyXxWwVv
    // の学生の場合：

    // DB接続設定
    $dsn='mysql:dbname=tb250356db;host=localhost';
    $user = 'tb-250356';
    $password = 'C2uckBn76n';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    

    
     $sql = "CREATE TABLE IF NOT EXISTS tbtest"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name CHAR(32),"
    . "comment TEXT"
    .");";
    $stmt = $pdo->query($sql);
?>


</body>
</html>