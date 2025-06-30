<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Gestão Concessionária</title>
    <link rel="stylesheet" href="../Usuarios/login/style/login.css" />
</head>
<body>
    <div class="container">
        <h1>Login - Gestão de Concessionária</h1>
        <form action="../Usuarios/login/Controller/Controllerlogin.php" method="post">

            <div class="login-method">
                <input type="checkbox" id="loginEmail" name="loginEmail" onclick="loginMethod()" />
                <label for="loginEmail">Entrar com email</label>
            </div>

            <div class="input-group username">
                <input type="text" id="username" name="username" placeholder=" " onblur="verifyData()" />
                <label for="username">Usuário</label>
            </div>

            <div class="input-group emailDiv" hidden>
                <input type="email" id="email" name="email" placeholder=" " onblur="verifyData()"/>
                <label for="email">Email</label>
            </div>

            <div class="input-group pass">
                <input type="password" id="password" name="password" required placeholder=" " onkeyup="verifyData()"/>
                <label for="password">Senha</label>
            </div>

            <span id="msgErro">Preencha devidamente os campos para prosseguir!</span>

            <div class="btns">
                <input type="reset" value="Limpar" name="limpar" class="buttons limpar" hidden/>
                <input type="submit" value="Entrar" name="entrar" class="buttons entrar" hidden/>
            </div>
        </form>
    </div>
    <script src="../Usuarios/login/Controller/login.js"></script>
</body>
</html>