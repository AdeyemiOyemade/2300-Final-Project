<?php
// INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Home";

include('includes/head.php');
?>

<body>

  <?php
  include('includes/header.php');

  ?>

  <main id="homepage">
<!-- mission statement -->
    <div class="mission">
      <p>Our mission is to build a welcoming community for Cornell's newest members: refugees.</p>
    </div>

    <p class="italics">When people are faced with impossible choices and forced to weigh the risks to their lives and the lives of their loved ones as they leave their homes to seek refuge, we are here to stand up, offer support and warm welcome into our community. We acknowledge the immense struggles they have encountered, and we also celebrate the immense strength and courage they continue to show.</p>

    <hr>

    <p class="italics"> <strong> <a href="getinvolved.php"> Join our mission now. </a> </strong> </p>


  </main>

  <!-- TODO: This should be your main page for your site. -->
  <?php
  include('includes/footer.php');

  ?>


</body>

</html>
