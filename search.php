<?php
    $textname = $_GET["products"];
    $user_ID = $_GET["user_ID"];
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
        

        $query = 'SELECT * FROM products WHERE product_name like   :product_Name';

        $stmt = $pdo->prepare($query);
        $product = '%'.$textname.'%';


        $stmt->bindParam(':product_Name', $product);


        $stmt->execute();
        $result = $stmt->fetchAll();
        if(empty($result)) {
            echo '該当データなし';
        }
        else{
            foreach($result as $row) {
            echo '<p>';
            echo $row["product_name"];
            echo ',  \\';
            echo $row["price"];
            echo '</p>';
            }
            ?>
            
            <form  action="select.php" method="get">
            <input type="hidden" name="start" value="0">
            <input type="hidden" name="size" value="5">
            <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
        
            <input type="submit" name="submitBtn" value="戻る">
        
          </form>
        <?php
        }

    }
        catch (PDOException $e) {
            //例外が発生したら無視
            require_once 'exception_tpl.php';
            echo $e->getMessage();
            exit();
          }
        
        ?>