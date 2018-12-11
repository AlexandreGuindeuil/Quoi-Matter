<?php session_start(); ?>
<link rel="stylesheet" href="style.css">
<h2>crée votre compte : </h2>
<form class="login-block" action="login_create_post.php" method="post"  enctype="multipart/form-data" >
<input type="text" name="pseudo" placeholder="Pseudo">
<input type="number" name="genres" placeholder="genres">
<p>L'ajout d'icon est facultatif</p>
<input type="file" name="icon" /><br />
<input type="text" name="mot_de_passe" placeholder="Mot De Passe">
<input type="submit" name="" value="S'inscrire">
</form>
