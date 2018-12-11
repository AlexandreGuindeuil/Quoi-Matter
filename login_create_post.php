<?php
session_start();
try
{
$bdd = new PDO('mysql:host=localhost;dbname=quoi_regarder_test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = htmlspecialchars($_POST['pseudo']);
$genres = $_POST['genres'];
$mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);



// ON INSERT DANS LA TABLE

  $reponse = $bdd->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = :nom ');
  $reponse->execute(array("nom" => $pseudo));
$donnees = $reponse->fetch();
var_dump($donnees) ;


if ($donnees['COUNT(*)'] > 0 ) {

  header('Location: login_center.php?error=2');

} else if (isset($_FILES['icon'])) {

        $infosfichier = pathinfo($_FILES['icon']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('png');


        if ( $extensions_autorisees['0'] == $extension_upload )
        {
          $req = $bdd->prepare('INSERT INTO membres (pseudo, mot_de_passe, nb_commentaires, nb_critiques, icon, genres) VALUES(:pseudo,:mot_de_passe,:nb_commentaires,:nb_critiques,:icon,:genres)');

                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['icon']['tmp_name'], 'uploads/' . $pseudo .'.png');

                $req->execute(array(
                  'pseudo' => $pseudo,
                  'mot_de_passe' => $mot_de_passe,
                  'nb_commentaires' => 0,
                  'nb_critiques' => 0,
                  'icon' => $pseudo.'.png',
                  'genres' => $genres
                ))  or die (print_r($bdd->errorInfo()));;
                $req->closeCursor();
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['icon'] = $pseudo.'.png';
                $_SESSION['nb_commentaires']=0;
                $_SESSION['nb_critiques']=0;
                $_SESSION['genres']=$genres;
                header('Location: quoi_regarder.php?succes=true');



      } else {
        header('Location: login_center.php?error=3');
      }

      }
      else {
        $req = $bdd->prepare('INSERT INTO membres (pseudo, mot_de_passe, nb_commentaires, nb_critiques, icon, genres) VALUES(:pseudo,:mot_de_passe,:nb_commentaires,:nb_critiques,:icon,:genres)');

$icon = 'basic-icon.png';

              $req->execute(array(
                'pseudo' => $pseudo,
                'mot_de_passe' => $mot_de_passe,
                'nb_commentaires' => 0,
                'nb_critiques' => 0,
                'icon' => $icon,
                'genres' => $_POST['genres']
              ))  or die (print_r($bdd->errorInfo()));;

              $req->closeCursor();
              $_SESSION['pseudo'] = $pseudo;
              $_SESSION['icon'] = $icon;
              $_SESSION['nb_commentaires']=0;
              $_SESSION['nb_critiques']=0;
              $_SESSION['genres']=$genres;
              header('Location: quoi_regarder.php?error=4');


      }





?>
