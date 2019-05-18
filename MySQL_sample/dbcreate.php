<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>データベースの作成</title>
</head>
<body>
  <?php
  $dsn = 'mysql:host=localhost; dbname=test';
  $username = 'root';
  $password = '';

  //文字化け対策
  $options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

  //phpのエラーを表示するように設定
  error_reporting(E_ALL & ~E_NOTICE);

  try{
    //DBの接続
    $dbh = new PDO($dsn, $username, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //SQL作成
    $sql = 'CREATE TABLE user (
      id INT(11) AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(20),
      mail_address VARCHAR(30),
      register_datetime DATETIME
    )';

    //SQL実行
    $res = $dbh->query($sql);

  } catch (PDOException $e){
    echo $e->getMessage();
    exit;
  }

  //接続閉じる
  $dbh = null;
  ?>
</body>
</html>
