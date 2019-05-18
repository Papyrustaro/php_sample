<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>更新中</title>
</head>
<body>
  <?php
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/menu.html');
  $id = $_POST['id'];
  $name = $_POST['name'];
  $mail_address = $_POST['mail_address'];

    try{
      $dsn = 'mysql:dbname=test;host=localhost';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->query('SET NAMES utf8');

      $name = htmlspecialchars($name);
      $mail_address = htmlspecialchars($mail_address);

      $sql = "UPDATE user SET name='$name',mail_address='$mail_address' WHERE id = '$id'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;
    }catch(\Exception $e){
      echo $e->getMessage();
    }

  exit();
  ?>
</body>
</html>
