<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-36</title>
</head>
<body>
  <?php 
  for($num=0;$num<=100;$num=$num+1)
  if($num%3==0 && $num%5==0 ){
      echo "BuzzFizz<br>";
  }elseif($num%3==0){
      echo "Buzz<br>";
  }elseif($num%5==0){
      echo "Fizz<br>";
  }else{echo $num."<br>";}
  ?>
</body>
</html>