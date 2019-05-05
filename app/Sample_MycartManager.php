<?php
class Sample_MycartManager
{
    private $dsn = 'mysql:dbname=sample;host=127.0.0.1';
    private $user = 'root';
    private $password = '';

    public function getMycart($user_id)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM mycarts where user_id = ?');
            $stmt->execute([$user_id]);

            $mycarts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $mycart = array();
            foreach ($mycarts as $record) {
                $stmt = $pdo->prepare('SELECT * FROM items where id = ?');
                $stmt->execute([$record['item_id']]);
                $item = $stmt->fetch(PDO::FETCH_ASSOC);
                $mycart = array_merge(
                    $mycart,
                    array(
                        array(
                            'id' => $item['id'],
                            'name' => $item['name'],
                            'price' => $item['price'],
                            'num' => $record['num'],
                            'image' => $item['image']
                        )
                    )
                );
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        return $mycart;
    }

    public function addItem($user_id, $item_id, $num) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM mycarts where user_id = ? and item_id = ?');
            $stmt->execute([$user_id, $item_id]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        //if (count($result) == 0) {
        if ($stmt->rowCount() == 0) {
            $this->insertDB($user_id, $item_id, $num);
        } else {
            $this->updateDB($user_id, $item_id, $result['num'] + $num);
        }
    }

    public function removeItem($user_id, $item_id) {
        if ($item_id == 0) {
            $this->deleteDB($user_id, null, true);
        } else {
            $this->deleteDB($user_id, $item_id, false);
        }
    }

    private function insertDB($user_id, $item_id, $num) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('INSERT INTO mycarts VALUES (?, ?, ?)');
            $stmt->execute([$user_id, $item_id, $num]);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;
    }
    
    private function updateDB($user_id, $item_id, $num) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('UPDATE mycarts SET num = ? WHERE user_id = ? and item_id = ?');
            $stmt->execute([$num, $user_id, $item_id]);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;
    }

    private function deleteDB($user_id, $item_id, $is_all) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            if ($is_all) {
                $stmt = $pdo->prepare('DELETE FROM mycarts WHERE user_id = ?');
                $stmt->execute([$user_id]);
            } else {
                $stmt = $pdo->prepare('DELETE FROM mycarts WHERE user_id = ? and item_id = ?');
                $stmt->execute([$user_id, $item_id]);
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;
    }

}
