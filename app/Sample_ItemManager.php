<?php
class Sample_ItemManager
{
    private $dsn = 'mysql:dbname=sample;host=127.0.0.1';
    private $user = 'root';
    private $password = '';

    public function getAllItemInfo()
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            //$pdo->query('SET NAMES utf8');
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $data = $pdo->query('SELECT * FROM items')->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        
        $pdo = null;

        return $data;
    }

    public function getItemInfoWithId($id)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM items where id = ?');
            $stmt->execute([$id]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        return $data;
    }
}
