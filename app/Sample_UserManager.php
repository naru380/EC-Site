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

        return $row['id'];
    }

    public function getUserInfo($id) 
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password,  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM users where id = ?');
            $stmt->execute([$id]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        /*
        $name = $row['name'];
        $address = $row['address'];
        $mail_address = $row['mail_address'];
        $password = $row['password'];

        $user_info = array(
            'id' => $id,
            'name' => $name,
            'address' => $address,
            'mail_address' => $mail_address,
            'password' => $password,
        );

        return $user_info;
        */

        return $row;
    }
    
    public function tempRegister($name, $mail_address, $password)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password,  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM users where mail_address = ?');
            $stmt->execute([$mail_address]);

            if ($stmt->rowCount() == 0) {
                $this->insertDB($name, null, $mail_address, $password, 0);
            } else {
                return Ethna::raiseNotice('このメールアドレスはすでに使われています', E_SAMPLE_USER_RGISTERED);
            }

            $stmt = $pdo->prepare('SELECT id FROM users where mail_address = ?');
            $stmt->execute([$mail_address]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $user['id'];

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        return $id;
    }

    public function register($id)
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password,  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('SELECT * FROM users where id = ?');
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;

        if ($stmt->rowCount() === 1) {
            if ($user['is_valid'] == false) {
                $name = $user['name'];
                $address = $user['address'];
                $mail_address = $user['mail_address'];
                $password = $user['password'];

                $this->updateDB($id, $name, $address, $mail_address, $password, true);
                return null;
            } 
        }

        return Ethna::raiseNotice('不正なアクセスです', E_SAMPLE_INVALID_QUERY);
    }

    public function changePassword($id, $new_password, $password)
    {
        $user = $this->getUserInfo($id);

        if($password != $user['password']) {
            return Ethna::raiseNotice('パスワードが正しくありません', E_SAMPLE_USER_PASSWORD);
        }

        $this->updateDB($id, $user['name'], $user['address'], $user['mail_address'], $new_password, $user['is_valid']);

        return null;

    }

    public function editInfo($id, $name, $address, $password)
    {
        $user = $this->getUserInfo($id);

        if($password != $user['password']) {
            return Ethna::raiseNotice('パスワードが正しくありません', E_SAMPLE_USER_PASSWORD);
        }

        $this->updateDB($id, $name, $address, $user['mail_address'], $password, $user['is_valid']);

        return null;
    }

    private function insertDB($name, $address, $mail_address, $password, $is_valid) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('INSERT INTO users (name, mail_address, address, password, is_valid) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$name, $mail_address, $address, $password, $is_valid]);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;
    }

    private function updateDB($id, $name, $address, $mail_address, $password, $is_valid) {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $stmt = $pdo->prepare('UPDATE users SET name = ?, address = ?, mail_address = ?, password = ?, is_valid = ? WHERE id = ?');
            $stmt->execute([$name, $address, $mail_address, $password, $is_valid, $id]);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        $pdo = null;
    }
}
