<?php
class Sample_UserManager
{
    private $dsn = 'mysql:dbname=sample;host=127.0.0.1';
    private $user = 'root';
    private $password = '';

    public function auth($mail_address, $password)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->query('SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM users where mail_address = ?');
            $stmt->execute([$mail_address]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        if (! isset($row['mail_address'])) {
            return Ethna::raiseNotice('メールアドレスまたはパスワードが正しくありません', E_SAMPLE_AUTH);
        }

        if ($row['password'] != $password) {
            return Ethna::raiseNotice('メールアドレスまたはパスワードが正しくありません', E_SAMPLE_AUTH);
        }

        return null;
    }

    public function getUserInfo($mail_address) 
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password,  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM users where mail_address = ?');
            $stmt->execute([$mail_address]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        $id = $row['id'];
        $name = $row['name'];
        $password = $row['password'];

        $user_info = array(
            'id' => $id,
            'name' => $name,
            'mail_address' => $mail_address,
            'password' => $password,
        );

        return $user_info;
        
    }
    
    public function register($name, $mail_address, $password)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password,  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM users where mail_address = ?');
            $stmt->execute([$mail_address]);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        if ($stmt->rowCount() == 0) {
            $this->insertDB($name, $mail_address, $password);
        } else {
            return Ethna::raiseNotice('このメールアドレスはすでに使われています', E_SAMPLE_USER_RGISTERED);

        }

        return null;
    }

    private function insertDB($name, $mail_address, $password) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('INSERT INTO users (name, mail_address, password) VALUES (?, ?, ?)');
            $stmt->execute([$name, $mail_address, $password]);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;
    }
}
