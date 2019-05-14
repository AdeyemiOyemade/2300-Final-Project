
<div class="person">
    <figure>
        <a class ='img-click' href = '<?php echo 'profile.php?id='.$id?>'>
         <img id = '<?php echo '#'.$picture_name?>' src="<?php echo htmlspecialchars($picturelink) ?>" alt="Picture of <?php echo htmlspecialchars($name) ?> "/> </a>
        <figcaption>
            <?php if ($pic_source) { ?>
         Permission from <?php echo htmlspecialchars($pic_source) ?>
        </figcaption>
                <?php } ?>
        </figure>
        <h2><?php echo htmlspecialchars($name) ?></h2>


    <div class = ' info-container hidden' id =<?php echo $picture_name."info"?>>
        <div class="personinfo"><?php echo htmlspecialchars($name) ?> </div>
        <div class="personinfo"><?php echo htmlspecialchars($year) ?> </div>
    </div>


</div>
