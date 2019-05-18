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

  $name=$_POST['name'];
  $mail_address=$_POST['mail_address'];

  $name=htmlspecialchars($name);
  $mail_address=htmlspecialchars($mail_address);

  if($name == '' && $mail_address == ''){
    print '検索するものを入力してください<br>';
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }
  if($mail_address == '') {
    $sql = "SELECT * FROM user WHERE name = '$name'";
  }
  if($name == '') {
    $sql = "SELECT * FROM user WHERE mail_address = '$mail_address'";
  }
  if($name && $mail_address) {
    $sql = "SELECT * FROM user WHERE name = '$name' AND mail_address = '$mail_address'";
  }

  try{
    //DBの接続
    $dbh = new PDO($dsn, $username, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //SQL実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec == false){
        break;
      }
      print $rec['id']; print '<br>';
      print $rec['name']; print '<br>';
      print $rec['mail_address']; print '<br>';
      print $rec['register_datetime']; print '<br>';
      print '<br>';
    }

  } catch (PDOException $e){
    echo $e->getMessage();
    exit;
  }

  //接続閉じる
  $dbh = null;
  ?>
</body>
</html>
