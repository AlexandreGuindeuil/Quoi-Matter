
<?php

$api_key = 'f23abf1087bbdf7a016056c7583c9c0a';

$movie_url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=f23abf1087bbdf7a016056c7583c9c0a&language=en-US
';
$movie_json = file_get_contents($movie_url);
$movie_array = json_decode($movie_json,true);

var_dump($movie_array);

foreach ($movie_array['genres'] as $key) {
  echo " ".$key['name']." ";
}
 ?>
