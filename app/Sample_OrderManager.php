<?php
class Sample_OrderManager
{
    private $dsn = 'mysql:dbname=sample;host=127.0.0.1';
    private $user = 'root';
    private $password = '';

    public function getMyordersAt($user_id)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT DISTINCT buy_at FROM orders WHERE user_id = ? ORDER BY buy_at DESC');
            $stmt->execute([$user_id]);

            $myorders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        return $myorders;
    }

    public function getMyorder($user_id, $buy_at)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM orders WHERE user_id = :user_id AND buy_at = :buy_at');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':buy_at', $buy_at, PDO::PARAM_STR);
            //$stmt->execute([$user_id, $buy_at]);
            /*
            $stmt = $pdo->prepare('SELECT * FROM orders WHERE user_id = :user_id');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            */
            $stmt->execute();

            //echo $stmt->rowCount();

            $myorder = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //echo count($myorder);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        return $myorder;
    }

    public function addOrder($user_id, $item_id, $num, $buy_at)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('INSERT INTO orders (user_id, item_id, num, buy_at) VALUES (:user_id, :item_id, :num, :buy_at)');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->bindParam(':num', $num, PDO::PARAM_INT);
            $stmt->bindParam(':buy_at', $buy_at, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        return $null;
    }
}

