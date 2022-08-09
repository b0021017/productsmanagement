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
  $product_ID = $_GET["product_ID"];
  $size = $_GET["size"];

?>
  <form action="update_3.php" method="get">
    <p>
    <label for="name">更新の内容を入力してください</label>
   </p>

     <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
     <input type="hidden" name="product_ID" value="<?php echo $product_ID; ?>">
     <input type="hidden" name="size" value="<?php echo $size; ?>">
     <input type="hidden" name="start" value="0" >



    <label for="Name">商品の名前：</label>
    <input type="text" name="product_name" placeholder="product_Name"/>

<p></p>

    <input type="submit" name="submitBtn" value="更新する">
  </form>




</body>
</div>
</html>
