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
    
    $id = 1 ; // idがこの値のデータだけを抽出したい、とする
$sql = 'SELECT * FROM tbtest WHERE id=:id ';
$stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
$stmt->execute();                             // ←SQLを実行する。
$results = $stmt->fetchAll(); 
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].'<br>';
    echo "<hr>";
    }

   
?>


</body>
</html>