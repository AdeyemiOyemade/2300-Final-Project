<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

if ( isset($_GET['country']))  {
  $getcountry = $_GET['country'];
  $getcountry = filter_var($getcountry, FILTER_SANITIZE_NUMBER_INT);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Around the World";

  include('includes/head.php')
?>

<body>

<?php
  include('includes/header.php')

?>

<main>
  <h1> Refugees Around the World </h1>

  <ul class="ref_def">
    <li> <strong>Ref·u·gee </strong></li>
    <li> Noun </li>
    <li> A person who has been forced to leave their country in order to escape war, persecution, or natural disaster. </li>
  </ul>
  <?php
  $sql = "SELECT * FROM countries";
  $countries = exec_sql_query($db, $sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($countries as $world) {

      $country = $world["country"];
      $countryid = $world["id"];

      $picture_name = $world['picture_name'];
      $picture_ext = $world["picture_ext"];

      $picturelink = "images/" . $picture_name . "." . $picture_ext;

      $pic_source = $world["pic_source"];
      $pic_source_link = $world["pic_source_link"];
      $pic_alt = $world["pic_alt"];

      include("includes/country.php");

    }
        ?>
</main>


<?php
  include('includes/footer.php')
?>

</body>
</html>
