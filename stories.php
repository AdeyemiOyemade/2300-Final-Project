<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");


?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Stories";

  include('includes/head.php')
?>

<body>

<?php
  include('includes/header.php');


?>
<main>
<div class = 'storyclass'>
<h1>Stories</h1>
<?php

// if the overlay is clicked on
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // sql to get the story from the stories table
  $sql = "SELECT * FROM stories WHERE id = :story_id;";
  $param = array(':story_id'=> $id);
  $stories = exec_sql_query($db, $sql, $param)->fetchAll(PDO::FETCH_ASSOC);

  // display that story

  foreach ($stories as $story) {


    $name = $story["name"];
    $country = $story["country"];
    $blurb = $story["blurb"];
    $thisstory = $story["story"];

    $picture_name = $story['picture_name'];
    $picture_ext = $story["picture_ext"];

    $picturelink = "uploads/stories/" . $picture_name . "." . $picture_ext;

    $pic_source = $story["pic_source"];
    $pic_source_link = $story["pic_source_link"];

?>
<!-- output the information -->
    <h2><?php echo htmlspecialchars($name) ?> - <?php echo htmlspecialchars($country) ?> </h2>
      <div>
        <img class = "smaller" src="<?php echo htmlspecialchars($picturelink) ?>" alt="Picture of <?php echo htmlspecialchars($name) ?> "/>
      </div>
      <div>
        <p><?php echo htmlspecialchars($blurb)?> </p>
        <p>"<?php echo htmlspecialchars($thisstory)?> "</p>
      </div>
    </div>

    <div>
      <p class="sources"> Source: <?php echo htmlspecialchars($pic_source_link) ?> </p>
    </div>

    <!-- go back button -->

    <a href = "stories.php" class = 'login-dec'>Go Back</a>
<?php
  }
}else {
  // else if the overlay is not clicked on, get all the stories from the stories table
$sql = "SELECT * FROM stories";
$stories = exec_sql_query($db, $sql)->fetchAll(PDO::FETCH_ASSOC);



foreach ($stories as $story) {

    $name = $story["name"];
    $country = $story["country"];
    $blurb = $story["blurb"];
    $thisstory = $story["story"];

    $picture_name = $story['picture_name'];
    $picture_ext = $story["picture_ext"];

    $picturelink = "uploads/stories/" . $picture_name . "." . $picture_ext;

    $pic_source = $story["pic_source"];
    $pic_source_link = $story["pic_source_link"];

  // display them

          include("includes/story.php");

      }
    }

    ?>




</div>


</main>
<?php
  include('includes/footer.php');
?>

</body>
</html>
