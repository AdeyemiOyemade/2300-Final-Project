<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");


?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Events";

  include('includes/head.php')
?>

<body>

<?php
  include('includes/header.php')

?>

<main>
  <h1> Events </h1>

  <?php
    $sql = "SELECT * FROM events";
    $events = exec_sql_query($db, $sql)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($events as $event) {

      $event_name = $event["name"];
      $event_startdate = $event["startdate"];
      $startdate = strtotime($event_startdate);
      $startdate2 = date("m/d/y", $startdate);
      $event_enddate = $event["enddate"];
      $enddate = strtotime($event_enddate);
      $enddate2 = date("m/d/y", $enddate);
      $event_starttime = $event["starttime"];
      $starttime = strtotime($event_starttime);
      $starttime2 = date("g:i A", $starttime);
      $event_endtime = $event["endtime"];
      $endtime = strtotime($event_endtime);
      $endtime2 = date("g:i A", $endtime);
      $event_location = $event["location"];
      $picture_name = $event['photo_name'];
      $picture_ext = $event["photo_ext"];
      $picture_source = $event['source'];

      $picturelink = "uploads/events/" . $picture_name . ".".$picture_ext;


      $pic_source = $event["pic_source"];
      $pic_source_link = $event["pic_source_link"];

      include('includes/oneEvent.php');
    }
  ?>

  </main>



<?php
  include('includes/footer.php')
?>

</body>
</html>
