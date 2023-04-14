<?php
// Check if form has been submitted
if (isset($_POST['btnVendre'])) {

  // Process form data here

  // Redirect to destination.php
  header("Location: pagevente.php");
  exit();
}elseif(isset($_POST['btnAcheter'])){
    header("Location: pageachat.php");
    exit();
}elseif(isset($_POST['btnLouer'])){
    header("Location: pagelocation.php");
    exit();
}
?>
