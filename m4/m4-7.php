<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_4-1</title>
</head>
<body>
    <?php
   
    // &#8203;``oaicite:{"number":1,"invalid_reason":"Malformed citation 【サンプル】"}``&#8203;
    // ・データベース名：tb219876db
    // ・ユーザー名：tb-219876
    // ・パスワード：ZzYyXxWwVv
    // の学生の場合：

    // DB接続設定
    $dsn='mysql:dbname=tb250356db;host=localhost';
    $user = 'tb-250356';
    $password = 'C2uckBn76n';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $id = 1;
    $name = "まりお";
    $comment = "るいーじ"; //変更したい名前、変更したいコメントは自分で決めること
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
   
    $sql = 'SELECT * FROM tbtest';
    $stmt = $pdo->query($sql);
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
