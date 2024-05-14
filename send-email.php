<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // PHPMailer nesnesi oluştur
    $mail = new PHPMailer(true);

    try {
        // Sunucu ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nisanur.gurel28@gmail.com'; // SMTP sunucusuna bağlanmak için kullanılan e-posta adresi
        $mail->Password = 'dhet zoxd towv hjpy'; // SMTP sunucusuna bağlanmak için kullanılan e-posta şifresi
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Alıcı bilgileri
        $mail->setFrom('nisanur.gurel28@gmail.com', 'Your Name');
        $mail->addAddress('nisanur.gurel28@gmail.com');

        // İleti içeriği
        $mail->isHTML(false); // İleti metin formatında
        $mail->Subject = 'Yeni İletişim Mesajı';
        $mail->Body = "Ad: $name\nE-posta: $email\n\nMesaj:\n$message";

        // E-posta gönder
        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo "failed: {$mail->ErrorInfo}";
    }
}
?>





