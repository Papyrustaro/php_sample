<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>表示</title>
</head>
<body>
  <?php
  $username=$_POST['username'];
  $comment=$_POST['comment'];

  print "ユーザー名: ".$username."<br>";
  print "コメント: ".$comment."<br>";
  ?>
</body>
</html>
