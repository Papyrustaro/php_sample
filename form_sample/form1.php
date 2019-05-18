
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>入力の確認</title>
</head>
<body>
  <?php
    $family_name=$_POST['family_name'];
    $first_name=$_POST['first_name'];

    $family_name=htmlspecialchars($family_name);
    $first_name=htmlspecialchars($first_name);

    if($family_name == ''){
      print '姓が入力されていません<br>';
    }

    if($first_name == ''){
      print '名が入力されていません<br>';
    }

    if($family_name == '' || $first_name == ''){
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
    }else{
      print '正常に入力されています<br>';
      print '姓: '.$family_name.'<br>';
      print '名: '.$first_name.'<br>';
    }

  ?>
</body>
</html>
