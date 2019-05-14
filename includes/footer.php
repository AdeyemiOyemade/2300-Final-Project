<footer>
        <?php if (!signed_in()) { ?>
                <span><a class = "login-dec" href="login.php">Log In</a></span>
        <?php } else { ?>
                <span> <a id = "logoutButton" class = 'login-dec' href="<?php echo "?submit_logout" ?>">Logout</a> </span>
        <?php } ?>
        <span>Contact us at: <a href="mailto:cornellwelcomesrefugees@gmail.com"> cornellwelcomesrefugees@gmail.com</a></span>
        <cite>Header Picture Source: <a href="https://registrar.cornell.edu/spaces/rockefeller-hall-1st-floor-and-basement-classrooms">Cornell University</a></cite>
        <cite> Font Source: <a href='https://fonts.adobe.com/fonts/proxima-nova'> Adobe</a></cite>
        <span><a href="https://www.facebook.com/cornellwelcomesrefugees/">Connect with us on
        <img src="images/facebooklogo.png" alt="Facebook" /></a></span>
        <!-- facebook logo repurposed from a logo that Jacob Chovanec used in his INFO 2300 P1, which was originally made for his group project 4 from last semester's INFO 1300 class -->
</footer>
