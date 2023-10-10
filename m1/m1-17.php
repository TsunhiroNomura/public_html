<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-36</title>
</head>
<body>
  <?php 
  $num = 15;
   if($num%5==0 && $num%3==0){
       echo "FizzBuzz";
   }elseif($num%5==0){
       echo "Buzz";
   }elseif($num%3==0){
       echo "fizz";
   }else{
       echo $num;
   }
  ?>
</body>
</html>