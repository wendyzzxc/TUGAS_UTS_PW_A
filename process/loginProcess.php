<?php
if (isset($_POST['login'])) {

    include('../db.php');
    $name = $_POST['name'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE name = '$name'") or die(mysqli_error($con));
    if (mysqli_num_rows($query) == 0) {
        echo
        '<script>
        alert("Name not found!"); window.location = "../page/login.php"
        </script>';
    } else {
        $user = mysqli_fetch_assoc($query);
        if ($user['status'] == 'inactive') {
            echo
            '<script>
            alert("Account Not Active");
            window.location = "../page/login.php"
            </script>';
        } else {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['profil'] = $name;
                $updatelog = "update users set login='logout' where name ='$name'";
                $query = mysqli_query($con, $updatelog);

                $update = "update users set login='login' where name ='$name'";
                $query = mysqli_query($con, $update);
                $_SESSION['isLogin'] = true;
                $_SESSION['user'] = $user;

                if ($name == 'admin') {
                    echo
                    '<script>
                    alert("Login Success"); window.location = "../page/index.php"
                    </script>';
                } else {
                    echo
                    '<script>
                    alert("Login Success"); window.location = "../index.php"
                    </script>';
                }
            } else {
                echo
                '<script>
                alert("Username or Password Invalid");
                window.location = "../page/login.php"
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
