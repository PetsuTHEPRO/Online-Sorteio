<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php include "./header.php"; ?>

    <article class="titulo-painel cadastro">
        <h1>Painel de Cadastro</h1>
    </article>
    <div id="cadastro">
        <span id="name">Nome Completo:</span>
        <input type="text" id="form-name" name="Nome Completo">
        <span id="nickname">Nickname do Instragram:</span>
        <input type="text" id="form-user" name="Nickname do Instagram">
        <span id="email">Email:</span>
        <input type="text" id="form-email" name="Email">
        <span id="senha">Senha:</span>
        <input type="password" id="form-password" name="Senha">
        <span id="nascimento">Data de Nascimento:</span>
        <input type="date" id="form-date" name="Data de nascimento">
        <button class="button" id="form-btn">Cadastrar</button>
    </div>
    <span id="name-page">area-cadastro</span>
    <script type="module" src="./script/main.js"></script>
</body>
</html>