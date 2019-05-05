<?php

include_once('PHPMailer/src/Exception.php');
include_once('PHPMailer/src/PHPMailer.php');
include_once('PHPMailer/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Sample_MailManager
{
    private $host = 'smtp.gmail.com';
    //private $username = 'wahsabieeeeeeeee@gmail.com';
    private $username = 'ec.sample.0510@gmail.com';
    private $password = 'naru1996';
    private $from = 'ec.site@sample.com';
    private $fromname = '通販サイト';

    public function sendMail($to, $toname, $subject, $body) {
        $mail = new PHPMailer(true);

        //$to = 'naruhey1211guitar.m@gmail.com';
        //$toname = '宛名';

        //$subject = '件名';
        //$body = '本文';

        // try {
            //メール設定
            //$mail->SMTPDebug = 1; //デバッグ用
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = $this->host;
            $mail->Username = $this->username;
            $mail->Password = $this->password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = "utf-8";
            $mail->Encoding = "base64";
            $mail->setFrom($this->from, $this->fromname);
            $mail->addAddress($to, $toname);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            //メール送信
            $mail->send();
            // echo '成功';

        // } catch (Exception $e) {
        //     echo '失敗: ', $mail->ErrorInfo;
        // }
    }
}
