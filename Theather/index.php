<?php
  require_once("templates/header.php");
  require_once("dao/MovieDAO.php");
  $movieDao = new MovieDAO($conn, $BASE_URL);
  $latestMovies = $movieDao->getLatestMovies();
  $aventureMovies = $movieDao->getMoviesByCategory("Aventura");
  $comedyMovies = $movieDao->getMoviesByCategory("Comédia");
?>
    <div id="main-container" class="container-fluid">
        <h2 class="section-title">LANÇAMENTOS</h2>
        <p class="section-description">Veja as críticas dos últimos filmes adicionados!</p>
        <div class="movies-container">
        <?php foreach($latestMovies as $movie ): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
        <?php if(count($latestMovies)===0): ?>
            <p class="empty-list">Ainda não há filmes cadastrados..</p>
        <?php endif; ?>
        </div>
        <h2 class="section-title">AVENTURA</h2>
        <p class="section-description">Veja as críticas das maiores aventuras!</p>
        <div class="movies-container">
        <?php foreach($aventureMovies as $movie): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
        <?php if(count($aventureMovies)===0): ?>
            <p class="empty-list">Ainda não há filmes cadastrados..</p>
        <?php endif; ?>
        </div>
        <h2 class="section-title">COMÉDIA</h2>
        <p class="section-description">Veja as críticas dos filmes mais engraçados!</p>
        <div class="movies-container">
        <?php foreach($comedyMovies as $movie): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
        <?php if(count($comedyMovies)===0): ?>
            <p class="empty-list">Ainda não há filmes cadastrados..</p>
        <?php endif; ?>
        </div>

  </div>
<?php
    require_once("templates/footer.php");
?>