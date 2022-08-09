<?php
  $user_ID = $_GET["user_ID"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $product_type = $_GET["type_ID"];
  $product_Name = $_GET["product_name"];
  $product_price = $_GET["price"];

  try{
    // データベースに接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=localhost;dbname=tpl;charset=utf8;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
    );


    $query = 'DELETE FROM products WHERE type_ID = :product_type and product_name = :product_Name and price = :product_price';

    $stmt = $pdo->prepare($query);





    // バインド
    //$stmt->bindParam(':user_ID', $user_ID);
    $stmt->bindParam('product_type', $product_type);
    $stmt->bindParam('product_Name', $product_Name);
    $stmt->bindParam('product_price', $product_price, PDO::PARAM_INT);


     // SQL文を実行
     $stmt->execute();
     require_once 'select.php';




  }
    catch (PDOException $e) {
        echo $e->getMessage();
      }
      finally {
        $pdo = null;
      }
    
    ?>