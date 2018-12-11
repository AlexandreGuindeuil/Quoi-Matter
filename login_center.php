<?php
session_start();
if ($_GET['error'] == 2){
  echo "RATER";
} else if ($_GET['error'] == 3){
  echo "mauvaise image ";
} else {
  echo "RATER ";
} ?>
