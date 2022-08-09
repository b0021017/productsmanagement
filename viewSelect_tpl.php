<!DOCTYPE html>
<html>
<head>
  <meta charset="utf=8">

  <title></title>
</head>
<body>
<p>ようこそ <?php echo $user_name; ?> さん</p>

<p>
  <form action="search.php" method="get">
   <label for="products">商品検索</label>
   <input type="text" name="products" placeholder="$products"/>
   <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
   <input type="submit" name="submitBtn" value="検索">
  </p>


<?php 
  $count = $start;
  foreach($result2 as $row){
    $count += 1;
    echo '<p>';
    echo $count;
    echo '<p>'; 
    echo $row["product_name"];
    echo ',  \\';
    echo $row["price"];
    echo '</p>';

    
 ?> 

     <form action="update.php" method="get">
     <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
     <input type="hidden" name="product_ID" value="<?php echo $row["product_ID"]; ?>">
     <input type="hidden" name="size" value="<?php echo $size; ?>">
     <input type="hidden" name="start" value="0" >

     <input type="submit" name="submitBtn" value="更新">
     </form>

     <form action="delete.php" method="get">
     <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
     <input type="hidden" name="size" value="5">
     <input type="hidden" name="start" value="0" >
     <input type="hidden" name="product_name" value="<?php echo $row["product_name"]; ?>" >
     <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" >
     <input type="hidden" name="type_ID" value="<?php echo $row["type_ID"]; ?>" >
     <input type="submit" name="submitBtn" value="削除">
    </form>

<?php
  }
?>
  <form action="select.php" method="get">
    <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
    <input type="hidden" name="start" value="


<?php
  $next = $start - 5;
  if ($next < 0){
    $next = 0;
  }
  echo $next;
?>
    ">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="前へ">
  </form>

  <form action="select.php" method="get">
    <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
    <input type="hidden" name="start" value="
  <?php
    $next = $start + 5;
    echo $next; 
  ?>
      ">
    <input type="hidden"name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="次へ">
  </form>
  
  <form action="add2.php" method="get">
    <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
    <input type="submit" name="submitBtn" value="商品追加">
  </form>

</body>
</html>
