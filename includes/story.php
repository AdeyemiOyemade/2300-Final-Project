

<div class="story">
    <!-- get the id of the story in the stories table -->
<?php $id = $story['id'];?>
    <!-- div to make overlay -->
    <div class = 'storyimg'>
        <!-- image of the overlay -->
<img src="<?php echo htmlspecialchars($picturelink) ?>" alt="Picture of <?php echo htmlspecialchars($name) ?> "/>
    <!-- overlay link -->
    <a href = "<?php echo "stories.php?id=".$id?>"><div class = "info">
        <!-- when hovered over this information will display -->
    <h2><?php echo htmlspecialchars($name); ?> - <?php echo htmlspecialchars($country) ?> </h2>
        <p><?php echo htmlspecialchars($blurb)?> </p>
        <p class = "underline"> Click on the image to learn more. </p>
        <cite> Source:  <?php echo htmlspecialchars($pic_source_link)?> </cite>
    </div>
    </a>

</div>
</div>
