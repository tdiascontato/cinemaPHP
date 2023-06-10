<?php
    require_once("globals.php");
    require_once("db.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    $message = new Message($BASE_URL);
    $flassMessage = $message->getMessage();
    if(!empty($flassMessage["msg"])) {
      // Limpar a mensagem
      $message->clearMessage();
    }
    $userDao = new UserDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiago's Theather</title>
    <link rel="short icon" href="<?=$BASE_URL?>img/users/icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.css" integrity="sha512-lp6wLpq/o3UVdgb9txVgXUTsvs0Fj1YfelAbza2Kl/aQHbNnfTYPMLiQRvy3i+3IigMby34mtcvcrh31U50nRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=$BASE_URL?>css/style.css">
</head>
<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?=$BASE_URL?>" class="navbar-brand">
                <span id="moviestar-title">Cinema do </span>
                <img src="<?=$BASE_URL?>img/users/logo.png" alt="Tiago's Theather" id="logo">
            </a>
            <!--Configurações bootstrap-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <form action="<?=$BASE_URL?>search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
                <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Procurar Filmes?" aria-label="Search">
            </form>
            <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
            <?php if($userData): ?>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>newmovie.php" class="nav-link">INCLUIR FILME</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link">MEUS FILMES</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold"><?= $userData->name ?></a>
            </li>
            <li class="nav-item"><a href="<?= $BASE_URL ?>logout.php" class="nav-link">SAIR</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>auth.php" class="nav-link">ENTRAR / CADASTRAR</a>
            </li>
          <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>
<?php if(!empty($flassMessage["msg"])):?>
    <div class="msg-container">
        <p class="msg <?=$flassMessage["type"]?>"><?=$flassMessage["msg"]?></p>
    </div>
<?php endif?>