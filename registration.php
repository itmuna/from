<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'myworlddb');

if (isset($_POST['register'])) {
    $id        = $_POST['id'];
    $email             = $_POST['email'];
    $password         = $_POST['password'];

    //$emptymsg1 = $emptymsg2 = $emptymsg3 =  '';

    // if (empty($users_id)) {
    //     $emptymsg1 = 'Write username';
    // }

    // if (empty($users_email)) {
    //     $emptymsg3 = 'Write email';
    // }
    // if (empty($users_password)) {
    //     $emptymsg4 = 'Write password';
    // }

    //if (!empty($user_id) && !empty($user_email) && !empty($user_password)) {

        $sql = "INSERT INTO user(user_id, user_email, user_pass) 
						VALUES('$id', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            header('location:"login.php"');
            $_SESSION['signupmsg'] = 'Sign Up Complete. Please Log in now.';
        } else {
            echo 'data not inserted';
        }

        $conn->close();
    // } else {
    //     $emptymsg = 'Fill up all fields';
    // }
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='style.css'>
</head>

<body>
    <div class='hero'>
        <div class='from-box'>
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button' class='toggle-btn' onclick='login()'>Log in</button>
                <button type='button' class='toggle-btn' onclick='register()'>Register</button>

            </div>
            <div class='social-icons'>
                <img src='fb.png'>
                <img src='tw.png'>
                <img src='gp.png'>
            </div>
            <p class='text-center text-success'>
                <?php if (!empty($_SESSION['signupmsg'])) {
                    echo $_SESSION['signupmsg'];
                }
                ?></p>

            <!-- Login form -->
            <form id='login' class='input-group' action='' method='POST' <?php echo $_SERVER['PHP_SELF'];
                                                                            ?>>
                <div>
                    <input type='text' class='input-field ' placeholder='user id' name='user id' recuired value="<?php if (isset($_POST['login'])) {
                                                                                                                        echo $users_id;
                                                                                                                    } ?>">
                    <span class='text-danger'><?php if (isset($_POST['login'])) {
                                                    echo $idmsg;
                                                }
                                                ?></span>
                </div>
                <div> <input type='text' class='input-field' placeholder='Enter Password ' name='password' recuired><span class='text-danger'><?php if (isset($_POST['login'])) {
                                                                                                                                                    echo $passmsg;
                                                                                                                                                }
                                                                                                                                                ?></span>
                </div>
                <br>
                <input type='checkbox' class='chech-box'><span>Remember Password</span>

                <button type='submit' class='submit-btn' name='login'>Log in</button>
            </form>
            <!-- Login form -->


            <!-- Register form -->
            <form id='register' class='input-group' action='' method='POST' <?php echo $_SERVER['PHP_SELF'];
                                                                            ?>>
                <div>
                    <input type='text' class='input-field' placeholder='user Id' recuired name='id' 
                        value="<?php if (isset($_POST['register'])) {
                                                                                                                    echo $users_id;
                                                                                                                } ?>">
                    <span class='text-danger'><?php if (isset($_POST['register'])) {
                                                    echo $emptymsg1;
                                                }
                                                ?></span>
                </div>
                <div>
                    <input type='email' class='input-field' placeholder='Email' name='email' recuired value="<?php if (isset($_POST['register'])) {
                                                                                                                    echo $users_email;
                                                                                                                } ?>">
                    <span class='text-danger'><?php if (isset($_POST['register'])) {
                                                    echo $emptymsg3;
                                                }
                                                ?></span>
                </div>
                <div>
                    <input type='text' class='input-field' placeholder='Enter Password' name='password' recuired>
                    <span class='text-danger'><?php if (isset($_POST['register'])) {
                                                    echo $emptymsg4;
                                                }
                                                ?></span>
                </div>
                <br>

                <input type='checkbox' class='chech-box'><span>I agree to the term & conditions</span>

                <button type='submit' class='submit-btn' name='register'>Register</button>

            </form>
            <!-- Register form -->
        </div>
    </div>

    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getelementbyid('btn');

        function register() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';
        }

        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0';
        }
    </script>

</body>

</html>