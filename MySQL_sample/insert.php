<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>データの追加</title>
</head>
<body>
  <?php
  $name=$_POST['name'];
  $mail_address=$_POST['mail_address'];

  $name=htmlspecialchars($name);
  $mail_address=htmlspecialchars($mail_address);

  if($name == ''){
    print 'アカウント名を入力してください<br>';
  }

  if($mail_address == ''){
    print 'メールアドレス入力してください<br>';
  }

  if($name == '' || $mail_address == ''){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }else{
    print '<form method="post" action="insertdata.php">';
    print '<input name="name" type="hidden" value="'.$name.'">';
    print '<input name="mail_address" type="hidden" value="'.$mail_address.'">';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
  }
  ?>
</body>
</html>
