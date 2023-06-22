<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <!--imagemzinha ao lado do title-->
     <link rel="shortcut icon" type="image/x-icon" href="../logo/logo-web-component.ico">

     <!--links internos-->
    <link rel="stylesheet" type="text/css" href="css/preloader.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>

    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <div class="bolas">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>

        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="square" style="--i:5;"></div>
            <div class="container">
                <div class="form">
                    <h2>Login de usuario</h2>
                    <form method="post" action="./validar-login.php">
                        <div class="inputBox">
                            <input type="text" placeholder="Nome de Usuario" name="txtLogin">
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Senha" name="txtSenha">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Logar">
                        </div>
                        <a href="" style="text-decoration:none">
                            <p class="forget">Cadastre-se</p>
                            <p class="forget">em:adm</p>
                            <p class="forget">se:123</p>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <?php
    if (isset($_GET['msg'])) {
        echo ("<h1>" . $_GET['msg'] . "</h1>");
    }
    ?>

    <script src="js/preloader.js"></script>
</body>
</html>
