<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_5-1</title>
</head>
<body>
    <?php
    // DB接続設定
    
    $dsn='mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザ名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    

    //テーブル作成
     $sql = "CREATE TABLE IF NOT EXISTS TTable"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name CHAR(32),"
    . "comment TEXT,"
    . "date datetime DEFAULT CURRENT_TIMESTAMP," // 日付を表すカラム
     . "password VARCHAR(255)" // パスワードを表すカラム（長さは255文字まで）
    .");";
    $stmt = $pdo->query($sql);
    
    
    //編集機能兼新規投稿
    if(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["yourpassword"])){
         $name=$_POST["name"];
         $comment=$_POST["comment"];
         $yourpassword= $_POST["yourpassword"];
          $date=date("Y/m/d h:i:s");
          
          if(empty($_POST["number"])){
              //新規投稿 
              $sql = "INSERT INTO TTable (name, comment, date, password) VALUES (:name, :comment, :date, :password)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':name', $name, PDO::PARAM_STR);
              $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
              $stmt->bindParam(':date', $date, PDO::PARAM_STR);
              $stmt->bindParam(':password', $yourpassword, PDO::PARAM_STR); 
              $stmt->execute();
          }else{  
              //編集機能突入
              $number=$_POST["number"];
              
               //変更する投稿番号
    $sql = 'UPDATE TTable SET name=:name, comment=:comment, date=:date, password=:password WHERE id=:number';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':password', $yourpassword, PDO::PARAM_STR);
    $stmt->bindParam(':number', $number, PDO::PARAM_INT);
    $stmt->execute();
              
              
          }
    }
    
     //編集機能
     if (!empty($_POST["editNumber"]) && !empty($_POST["editpassword"])) {
    $editNumber = $_POST["editNumber"];
    $editpassword = $_POST["editpassword"];
        
    $sql = 'SELECT * FROM TTable WHERE id=:editNumber AND password=:editpassword';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':editNumber', $editNumber, PDO::PARAM_INT);
    $stmt->bindParam(':editpassword', $editpassword, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(); //抽出する
    foreach($results as $row) {
        $editname = $row['name'];
        $editcomment = $row['comment'];
        $editNumber = $row['id'];
    }
}
        
              
   //データ削除      
     if (!empty($_POST["deleteNumber"]) && !empty($_POST["deletepassword"])) {
         $deleteNumber = $_POST["deleteNumber"]; // 削除対象番号を取得
    $deletepassword = $_POST["deletepassword"];
    
    $sql = 'delete from TTable where id=:deleteNumber AND password=:deletepassword';//削除番号とパスワードが一致している行の抽出
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':deleteNumber', $deleteNumber, PDO::PARAM_INT);
    $stmt->bindParam(':deletepassword', $deletepassword, PDO::PARAM_STR);
    $stmt->execute();
          }
   
   
   
?>
     
     
  <form action="" method="post">
        <input type="text" name="name" placeholder="名前"  value="<?php if(isset($editname)) {echo $editname;}?>"><br>
        <input type="text" name="comment" placeholder="コメント" value="<?php if(isset($editcomment)) {echo $editcomment;}?>"><br>
         <input type="password"  name="yourpassword" placeholder="パスワード"><br>
        
        <input type="hidden" name="number" value="<?php if(!empty($_POST["editNumber"]) && !empty($_POST["editpassword"])) { echo $editNumber; } ?>">
       
        <input type="submit" name="submit" ><br>
        
        

        <input type="number" name="deleteNumber" placeholder="削除対象番号" ><br>
        <input type="password"  name="deletepassword"placeholder="パスワード"><br>
        <input type="submit" name="submit" value="削除"><br>
        


        <input type="number" name="editNumber" placeholder="編集対象番号" ><br>
        <input type="password"  name="editpassword"placeholder="パスワード"><br>
        <input type="submit" name="submit" value="編集"><br>
    </form>
    
    <?php
    $sql='SELECT*FROM TTable';
    $stmt=$pdo->query($sql);
    $results=$stmt->fetchAll();
    foreach($results as $row){
    echo $row['id'].' ';
    echo $row['name'].'';
    echo $row['comment'].'';
    echo $row['date']; 
    echo "<hr>";
}
?>


</body>
</html>