<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

if ( isset($_GET['resource']))  {
  $getresource = $_GET['resource'];
  $getresource = filter_var($getresource, FILTER_SANITIZE_NUMBER_INT);
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Resources";

  include('includes/head.php')
?>

<body>

<?php
  include('includes/header.php')
?>


  <!-- TODO: This should be your main page for your site. -->
  <main>
    <h1>Resources</h1>
  <?php
    $sql = "SELECT * FROM resource_types";
    $resource_types = exec_sql_query($db, $sql)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resource_types as $resource_type) {

     // $resource_title = $resource["resource_title"];
      $resource_id = $resource_type['id'];
      $resource_type = $resource_type["name"];

      include('includes/resource.php');
    }
  ?>
  </main>
<?php

  include('includes/footer.php');

?>



</body>
</html>
