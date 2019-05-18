<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>一覧</title>
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
    $sql = 'SELECT * FROM user';
    //SQL実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while($rec = $stmt->fetch(PDO::FETCH_ASSOC)){
      print $rec['id']; print '<br>';
      print $rec['name']; print '<br>';
      print $rec['mail_address']; print '<br>';
      print $rec['register_datetime']; print '<br>';
      print '<br>';
    }

  } catch (PDOException $e){
    print $e->getMessage();
    exit;
  }

  //接続閉じる
  $dbh = null;
  ?>
</body>
</html>
