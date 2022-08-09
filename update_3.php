<?php
  $user_ID = $_GET["user_ID"];
  $product_ID = $_GET["product_ID"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $product_name = $_GET["product_name"];
  // データベースに接続

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

      $query = 'UPDATE products SET product_name =:product_name WHERE product_ID = :product_ID';
      
      $stmt = $pdo->prepare($query);

    // バインド
    $stmt->bindParam(':product_ID', $product_ID);
    $stmt->bindParam(':product_name', $product_name);


     // SQL文を実行
    $stmt->execute();



    require_once 'select.php';


  } 
  catch (PDOException $e) {
    //例外が発生したら無視
    require_once 'exception_tpl.php';
    echo $e->getMessage();
    exit();
  }
  //  require_once 'login_tpl.php'

?>