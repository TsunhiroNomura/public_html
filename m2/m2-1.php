<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-20</title>
</head>
<body>
    <form action="" method=post>
        <input type="text" name="str">
        <input type="submit" name="submit">
        </form>
    <?php
    if(!empty($_POST["str"])) {
        
        $str = $_POST["str"];
        
        echo "$str.を受け付けました: " ;
    }
?>


</body>
</html>