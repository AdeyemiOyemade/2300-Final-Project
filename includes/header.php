<header>
    <!-- <div class = "logoTitle"> to remove the logo just take out logoTitle and cwrLogo divs and it goes back to normal -->
        <!--  <div class="cwrLogo">
          <img src="images/logo.png" alt="Cornell Welcomes Refugees Logo"/>
        </div>-->
        <div class="title_div">
        <a href = "index.php"><div class="title_words"><h1 id = "title">Cornell Welcomes Refugees </h1></div></a>
</div>

    <?php $current_file = basename($_SERVER['PHP_SELF']);
    // code above taken from INFO 2300 lab02 write up https://github.coecis.cornell.edu/info2300-sp2019/info2300-sp2019-website/blob/master/assignments/lab-03/lab-3.md

    $current_style = "current_page";
    ?>

    <ul class="nav">
        <li class = "<?php if ($current_file == 'index.php') {echo $current_style;}?>"><a href="index.php">Home</a></li>
        <li class = "<?php if ($current_file == 'team.php') {echo $current_style;}?>"><a href="team.php">Team</a></li>
        <li class = "<?php if ($current_file == 'events.php') {echo $current_style;}?>"><a href="events.php">Events</a></li>
        <li class = "<?php if ($current_file == 'stories.php' || $current_file == 'world.php' || $current_file == 'resources.php') {echo $current_style;}?>" id="dropdown">Learn More <span id="downarr">⌄</span>
            <ul class= "miniNav">
                <li><a href="stories.php">Stories</a></li>
                <li><a href="world.php">Around the World</a></li>
                <li><a href="resources.php">Resources</a></li>
            </ul>
        </li>
        <li class = "<?php if ($current_file == 'getinvolved.php') {echo $current_style;}?>"><a href="getinvolved.php">Get Involved</a></li>

        <?php if(signed_in()){ ?>
        <li class = "<?php if ($current_file == 'admin.php') {echo $current_style;}?>"><a href="admin.php">Admin</a></li>
        <?php } ?>
    </ul>



</header>
