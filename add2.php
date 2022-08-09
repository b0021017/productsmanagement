<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <div align="center" class="body">

</head>

<body>

<?php
  $user_ID = $_GET["user_ID"];
?>

  <form action="add.php" method="get">
    <p>
    <label for="name">商品情報を入力してください</label>
   </p>



    <label for="Name">商品の名前：</label>
    <input type="text" name="Name" placeholder="product_Name"/>

    <p></p>
    
    <label for="type_ID">商品のタイプ：</label>
    <input type="text" name="type_ID" placeholder="product_type"/>
    <p></p>

    <label for="price">商品の値段：</label>
    <input type="int" name="price" placeholder="product_price"/>
    <p></p>

     
    <input type="submit" name="submitBtn" value="登録">
  </form>

  <form  action="select.php" method="get">
    <input type="hidden" name="start" value="0">
    <input type="hidden" name="size" value="5">
    <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">

    <input type="submit" name="submitBtn" value="戻る">

  </form>
</body>
</div>
</html>
