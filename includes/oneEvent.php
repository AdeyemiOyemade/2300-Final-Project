
<div class = "all_events">
    <!--<div class="events_background"> </div> -->
    <div class="list_holder">
        <ul class = "events_list">
            <li> <h3><?php echo htmlspecialchars($event_name) ?></h3> </li>
            <li> <?php echo htmlspecialchars($startdate2); if($event_enddate != NULL) {?> - <?php echo htmlspecialchars($enddate2);} ?> </li>
            <li> <?php echo htmlspecialchars($starttime2); if($event_endtime != NULL) {?> to <?php echo htmlspecialchars($endtime2);}?> </li>
            <li> <?php echo htmlspecialchars($event_location) ?> </li>
        </ul>
    </div>
    <div class="eventpics">
        <figure>
            <img src = <?php echo $picturelink ?> alt = "no image available">
            <?php
            if ($picture_source != null) { ?>
                <figcaption class="sources">
                    <strong> Source: </strong><?php echo htmlspecialchars($picture_source)?>
                </figcaption>
            <?php
            }
            ?>

        </figure>
    </div>
</div>
