<?php
  $user_ID = $_GET["user_ID"];
  $product_ID = $_GET["product_ID"];
  $start = $_GET["start"];
  $size = $_GET["size"];
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


    $query = 'SELECT * FROM products WHERE product_ID = :product_ID';

      $stmt = $pdo->prepare($query);

    // バインド
    $stmt->bindParam(':product_ID', $product_ID);
    //$stmt->bindParam(':password', $password);


     // SQL文を実行
    $stmt->execute();


    $result = $stmt->fetchAll();

    require_once 'update_2.php';


  } 
  catch (PDOException $e) {
    //例外が発生したら無視
    require_once 'exception_tpl.php';
    echo $e->getMessage();
    exit();
  }
  //  require_once 'login_tpl.php'

?>