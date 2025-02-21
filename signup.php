<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style_signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
<div class="authorization">
            <p class="regist">Регистрация</p>

            <form action="include_signup.php" method="POST">

                <div class="nick">
                    <label class="label_nick">nickname</label>
                    <input type="text" name="nick" class="search" placeholder="">
                </div>

                <div class="email">
                    <label class="label_email">email</label>
                    <input type="text" name="email" class="search" placeholder="">              
                </div>
            
                <div class="password">
                    <span class="icon-pass" id="icon-pass">&#128065;</span>
                    <label class="label_password" for="pass">password</label>
                    <input type="password" name="password" class="search" id="pass">
                </div>

                <button type="submit" class="continue">
                    Зарегистрироваться
                </button>

                <?php
                    if (isset($_SESSION['message'])){
                        echo '<p class="msg"> ' . $_SESSION['message'] . '  </p>';
                    }
                     unset($_SESSION['message']);
                
                     ?>
            </form>

</div>

<script>
    const inputPass = document.getElementById('pass');
    const iconPass = document.getElementById('icon-pass');

    iconPass.addEventListener('click', () => {
        if (inputPass.getAttribute('type') === 'password'){
            inputPass.setAttribute('type', 'text');
        } else{
            inputPass.setAttribute('type', 'password');
        }
    });
</script>

</body>

</html>