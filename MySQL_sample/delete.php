<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>データの削除</title>
</head>
<body>
  <?php
  $dsn = 'mysql:host=localhost; dbname=test';
  $username = 'root';
  $password = '';
  $id = $_POST['id'];

  //文字化け対策
  $options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

  //phpのエラーを表示するように設定
  error_reporting(E_ALL & ~E_NOTICE);

  try{
    //DBの接続
    $dbh = new PDO($dsn, $username, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //SQL作成
    $sql = "DELETE FROM user WHERE id = '$id'";

    //SQL実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

  } catch (PDOException $e){
    echo $e->getMessage();
    exit;
  }

  //接続閉じる
  $dbh = null;
  ?>
</body>
</html>
