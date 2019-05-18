<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>データの更新</title>
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
    $sql = "SELECT * FROM user WHERE id = '$id'";

    //SQL実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false){
      print '入力されたIDは登録されていません<br>';
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
    } else {
      print 'ID: '.$rec['id'].'<br>';
      print '<form method="post" action="updatedata.php">';
      print '<input name="id" type="hidden" value="'.$id.'">';
      print 'アカウント名:<input name="name" value="'.$rec['name'].'"><br>';
      print 'メールアドレス:<input name="mail_address" value="'.$rec['mail_address'].'"><br>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="変更">';
      print '</form>';
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
