<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>入力成功</title>
</head>
<body>
  <?php
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/menu.html');

    try{
      $dsn = 'mysql:dbname=test;host=localhost';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->query('SET NAMES utf8');

      $name = $_POST['name'];
      $mail_address = $_POST['mail_address'];

      $name = htmlspecialchars($name);
      $mail_address = htmlspecialchars($mail_address);

      $sql = "INSERT INTO user(name,mail_address) VALUES ('$name','$mail_address')";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;
    }catch(\Exception $e){
      print '工事中';
    }

  exit();
  ?>
</body>
</html>
