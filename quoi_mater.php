<?php

if (!empty($_POST['numero'])) {


  $api_key = 'f23abf1087bbdf7a016056c7583c9c0a';

  $movie_url = 'https://api.themoviedb.org/3/movie/popular?api_key=f23abf1087bbdf7a016056c7583c9c0a&language=en-US&page=1';
  $movie_json = file_get_contents($movie_url);
  $movie_array = json_decode($movie_json,true);

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="master.css">
  <title></title>
</head>
<body>


  <form class="" action="quoi_mater.php" method="post">

    <input type="text" name="numero" value="">
    <button type="submit" name="button" value="submit">Submit</button>

  </form>

  <?php foreach ($movie_array['results'] as $key ) {
    ?>
    <div class="fiche">
      <?php
      echo "<h2> ".$key['original_title']."</h2>";
      ?>

      <p class="description"><?php echo $key['overview']; ?></p>
      <img src="<?php echo "https://image.tmdb.org/t/p/w500/".$key['poster_path'] ?>" alt="">

    </div>

    <?php   $movie_url = 'https://api.themoviedb.org/3/movie/'.$key['id'].'/similar?api_key=f23abf1087bbdf7a016056c7583c9c0a&language=en-US&page=1';
    $movie_json = file_get_contents($movie_url);
    $movie_array = json_decode($movie_json,true);
    ?>
    <div class="similar">

      <?php foreach ($movie_array['results'] as $key) {
        ?>
        <div class="block-similar">

          <h2><?php echo $key['original_title'] ?></h2>
          <img src="<?php echo "https://image.tmdb.org/t/p/w500/".$key['poster_path'] ?>" alt="">
          <?php echo $key['id']; ?>

        </div>
        <?php
      } ?>
    </div>
<?php
 } ?>


  </body>
</html>
