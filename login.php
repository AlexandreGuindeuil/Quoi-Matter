
<?php

$api_key = 'f23abf1087bbdf7a016056c7583c9c0a';

$movie_url = 'https://api.themoviedb.org/3/movie/58694/translations?api_key=f23abf1087bbdf7a016056c7583c9c0a';
$movie_json = file_get_contents($movie_url);
$movie_array = json_decode($movie_json,true);

var_dump($movie_array);
foreach ($movie_array['translations'] as $key ) {
 var_dump($key['data']);
}
 ?>
