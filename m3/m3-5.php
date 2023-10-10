</body>
</html> <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>m3-5</title>
</head>
<body>
     
    <?php
     $filename = "m3-5.txt"; // ファイル名を修正
  
     if(!empty($_POST["name"]) && !empty($_POST["str"]) && !empty($_POST["yourpassword"])){
         $name=$_POST["name"];
         $str=$_POST["str"];
         $yourpassword= $_POST["yourpassword"];
          $date=date("Y/m/d h:i:s");
          
          if(empty($_POST["number"])){
              if(file_exists($filename)){
                  $lines=file($filename, FILE_IGNORE_NEW_LINES);
                  $postNumber=count($lines)+1;
              }else {
                  $postNumber = 1;
              }
              $comment=$postNumber."<>".$name."<>".$str."<>".$date."<>".$yourpassword;
              $fp=fopen($filename,"a");
              fwrite($fp,$comment.PHP_EOL);
              fclose($fp);
          }else{
              $number=$_POST["number"];
              $Lines=file($filename, FILE_IGNORE_NEW_LINES);
              $fp=fopen($filename,"w");
              foreach($Lines as $line){
                  $data=explode("<>",$line);
                  if($data[0]==$number){ // $date[0] を修正
                      fwrite($fp,$number."<>".$name."<>".$str."<>".$date."<>".$yourpassword.PHP_EOL);
                  }else{
                      fwrite($fp,$line.PHP_EOL);
                  }
              }
              fclose($fp);
          }
     }

   
    
    if(!empty($_POST["deleteNumber"]) && !empty($_POST["deletepassword"])){
        $deleteNumber = $_POST["deleteNumber"]; // 削除対象番号を取得
        $deletepassword=$_POST["deletepassword"];
      
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $fp = fopen($filename, "w");
      
         $deleted = false; // 削除が行われたかどうかのフラグ

    foreach ($lines as $line) {
        $data = explode("<>", $line);
        $postNumber = $data[0];
        $depass = $data[4];

        if ($depass == $deletepassword && $postNumber == $deleteNumber) {
            // パスワードが一致し、削除対象番号と一致する行はスキップ
            fwrite($fp,"");
        } else {
            // パスワードが一致しない、または削除対象番号と一致しない行は書き込む
            fwrite($fp, $line . PHP_EOL);
        }
    }

    fclose($fp);

}



     // 編集機能
     if(!empty($_POST["editNumber"])  && !empty($_POST["editpassword"])){
        $editNumber = $_POST["editNumber"];
        $editpassword=$_POST["editpassword"];
        
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
    
        foreach($lines as $line){
            $data = explode("<>", $line);
            $postNumber = $data[0];
            $edpass=$data[4];
        
            if($postNumber == $editNumber && $edpass==$editpassword){
                $editname = $data[1];
                $editcomment = $data[2];
                break;
                
            }else{
             $editname = "";
         $editcomment = "";   
            }

        }
     }
     else{
         $editname = "";
         $editcomment = ""; 
     }
?>
 
  
  <form action="" method="post">
        <input type="text" name="name" placeholder="名前"  value="<?php echo $editname; ?>"><br>
        <input type="text" name="str" placeholder="コメント" value="<?php echo $editcomment;?>"><br>
         <input type="password"  name="yourpassword" placeholder="パスワード"><br>
        
        <input type="hidden" name="number" value="<?php if(!empty($_POST["editNumber"])) {
            echo ($_POST["editNumber"]);}?>">
       
        <input type="submit" name="submit" ><br>
        
        

        <input type="number" name="deleteNumber" placeholder="削除対象番号" ><br>
        <input type="password"  name="deletepassword"placeholder="パスワード"><br>
        <input type="submit" name="submit" value="削除"><br>
        


        <input type="number" name="editNumber" placeholder="編集対象番号" ><br>
        <input type="password"  name="editpassword"placeholder="パスワード"><br>
        <input type="submit" name="submit" value="編集"><br>
    </form>
    
 <?php
 if(file_exists($filename)){  
     $lines = file($filename, FILE_IGNORE_NEW_LINES);
     foreach($lines as $line){
         $elements=explode("<>",$line);
         echo "$elements[0] $elements[1] $elements[2] $elements[3] <br>";
     }
 }
?>
</body>
</html> 