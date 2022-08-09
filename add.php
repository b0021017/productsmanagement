<?php
  //$user_ID = $_GET["user_ID"];
  $product_type = $_GET["type_ID"];
  $product_Name = $_GET["Name"];
  $product_Price = $_GET["price"];
  //$password = $_GET["password"];
  //$start = $_GET["start"];
  //$size = $_GET["size"];
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

      // SQLクエリ作成（よくない例）
//    $query = 'SELECT * FROM user WHERE user_ID = \''. $user_ID . '\' AND password = \'' . $password . '\'';
      $query = 'INSERT INTO products(type_ID, product_name, price, order_date, order_status) VALUES ( :product_type, :product_Name, :product_Price, now(), 3)';

      $stmt = $pdo->prepare($query);

    // バインド
    //$stmt->bindParam(':user_ID', $user_ID);
    $stmt->bindParam('product_type', $product_type);
    $stmt->bindParam('product_Name', $product_Name);
    $stmt->bindParam('product_Price', $product_Price, PDO::PARAM_INT);

    //$stmt->bindParam(':password', $password);


     // SQL文を実行
    $stmt->execute();
    require_once 'add2.php';
      

  }
  catch (PDOException $e) {
    //例外が発生したら無視
    require_once 'exception_tpl.php';
    echo $e->getMessage();
    exit();
  }
  //  require_once 'login_tpl.php'

?>