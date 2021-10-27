<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['register'])) {


    include('db.php');
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $token = bin2hex(random_bytes(15));

    $emailquery = "select * from users where email = '$email'";
    $namequery = "select * from users where name = '$name'";
    $query = mysqli_query($con, $emailquery) or die(mysqli_error($con));
    $nquery = mysqli_query($con, $namequery) or die(mysqli_error($con));

    if (mysqli_num_rows($query) > 0) {
        echo
        '<script>
            alert("Email already exist");
            window.location = "./page/register.php"
        </script>';
    } else {
        if (mysqli_num_rows($nquery) > 0) {
            echo
            '<script>
            alert("Name already exist");
            window.location = "./page/register.php"
        </script>';
        } else {
            $insertquery = "INSERT INTO users(name, password, email, token, status,login,foto) VALUES ('$name', '$password', '$email','$token','active','logout','personAwal.png')";
            $iquery = mysqli_query($con, $insertquery) or die(mysqli_error($con));

            if ($iquery) {
                echo
                '<script>
                    alert("Register Succesfully");
                    window.location = "./page/login.php"
                    </script>';

                // require './vendor/autoload.php';

                // $mail = new PHPMailer(true);
                // try {
                //     $mail->isSMTP();
                //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                //     $mail->Host       = 'smtp.gmail.com';
                //     $mail->SMTPAuth   = true;
                //     $mail->Username   = 'wendyzzcb@gmail.com';
                //     $mail->Password   = 'wendydabosingkep03';
                //     $mail->Port       = 587;
                //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                //     $mail->setFrom('wendyzzcb@gmail.com', 'Account Activation');
                //     $mail->addAddress($email);
                //     $mail->isHTML(true);
                //     $mail->Subject = 'Email Activation';
                //     $mail->Body    = 'Hi, ' . $name . '. click here to active your account ';
                //     $mail->Body .= '<br>';
                //     $mail->Body .= '<a href="http://localhost:8080/RESTORAN_UTS/process/activation.php?token=' . $token . '"><button>confirm</button> </a>';
                //     $mail->send();
                // } catch (Exception $e) {
                //     mysqli_query($con, "DELETE FROM users WHERE email='$email'");
                //     echo "Email sending failed...";
                // }
                // $to_email = mysqli_real_escape_string($con, $_POST['email']);
                // $subject = "Email Activation";
                // $body = "Hi, $name. click here to active your account 
                // http://localhost:8080/RESTORAN_UTS/process/activation.php?token=$token";
                // $headers = "From: Foodies";
                // if (mail($to_email, $subject, $body, $headers)) {
                //     echo
                //     '<script>
                //     alert("Email sent successfully. PLEASE CHECK YOUR EMAIL!");
                //     window.location = "../component/login.php"
                //     </script>';
                // } else {
                //     echo "Email sending failed...";
                // }
            } else {
                echo
                '<script>
        alert("Register Failed");
        </script>';
            }
        }
    }
} else {
    echo
    '<script>
    window.history.back()
    </script>';
}
