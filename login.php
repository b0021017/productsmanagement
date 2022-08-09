<?php
  $user_ID = $_GET["user_ID"];
  $password = $_GET["password"];
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

      // SQLクエリ作成（よくない例）
//    $query = 'SELECT * FROM user WHERE user_ID = \''. $user_ID . '\' AND password = \'' . $password . '\'';
      $query = 'SELECT * FROM user WHERE user_ID = :user_ID AND password = :password';
   // $query = 'SELECT * FROM user';
    // 条件指定したSQL文をセット
   // $stmt = $pdo->prepare('SELECT * FROM user');
      $stmt = $pdo->prepare($query);

    // バインド
    $stmt->bindParam(':user_ID', $user_ID);
    $stmt->bindParam(':password', $password);


     // SQL文を実行
    $stmt->execute();

     /*
     // ループして1レコードずつ取得
    foreach ($stmt as $row) {
        echo ($row["user_ID"]);
        echo ",";
        echo ($row["user_name"]);
        echo ",";
        echo ($row["password"]);
        echo ",";
        echo ($row["permission"]);
        echo "<BR>";
    }
      */
    // 実行結果のフェッチ
    $result = $stmt->fetchAll();
    if (empty($result))
    {
      require_once 'login.html';
    }
    else 
    {
      $user_name = $result[0]["user_name"];
      // 5件だけ検索
      $query2 = 'SELECT * FROM products order by product_id limit :begin, :size';

      $stmt2 = $pdo->prepare($query2);
      $stmt2->bindParam(':begin' , $start, PDO::PARAM_INT);
      $stmt2->bindParam(':size' , $size, PDO::PARAM_INT);
      $stmt2->execute();
      $result2 = $stmt2->fetchAll();
      
      require_once 'viewSelect_tpl.php';
    }

  } 
  catch (PDOException $e) {
    //例外が発生したら無視
    require_once 'exception_tpl.php';
    echo $e->getMessage();
    exit();
  }
  //  require_once 'login_tpl.php'

?>