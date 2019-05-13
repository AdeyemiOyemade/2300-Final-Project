<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");


?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Team";

  include('includes/head.php');
?>
<body>

<?php
  include('includes/header.php');

?>
<main>
<h1> 2018-2019 Executive Board </h1>
<div class="persongrid">
<?php
$sql = "SELECT * FROM people";
$people = exec_sql_query($db, $sql)->fetchAll(PDO::FETCH_ASSOC);


foreach ($people as $person) {

    $id = $person['id'];
    $name = $person["name"];
    $year = $person["year"];

    $picture_name = $person['picture_name'];
    $picture_ext = $person["picture_ext"];

    $picturelink = "uploads/people/" . $picture_name . "." . $picture_ext;
    $pic_source = $person["pic_source"];
    include("includes/person.php");
  ?>


  <?php

  }
       ?>

</div>

<div class="thank_yous">
  <h2>Thank you to the past eboard for all of your dedication, and special thanks to Salma Shitia for allowing us to be where we are.</h2>
  <ul class="eboard_list">
    <li>Salma Shitia</li>
    <li>Annie Riley</li>
    <li>Oghuz Anwar</li>
    <li>Tessa Yu</li>
    <li>Summer Stephens</li>
    <li>Dara Canchester</li>
    <li>Jad Rahbany</li>
  </ul>
</div>
</main>

  <!-- TODO: This should be your main page for your site. -->
<?php
  include('includes/footer.php')
?>

</body>
</html>
