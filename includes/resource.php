<!-- reference code below -->

<div class="resource">
<?php if($getresource!=$resource_id){?>
  <a href="?resource=<?php echo(htmlspecialchars($resource_id))?>"><h2><?php echo htmlspecialchars($resource_type) ?><span class="downarr">⌄</span></h2></a>

<?php }else{?>
  <a href="resources.php"><h2><?php echo htmlspecialchars($resource_type) ?><span class="downarr">⌃</span></h2></a>
    <ul>
    <?php
      $sql = "SELECT * FROM resources WHERE resource_id = :id";
      $params = array(':id' => $resource_id);
      $resources = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);

      foreach($resources as $resource){
        echo "<li class='term'><a href='" . htmlspecialchars($resource['resource_link']) . "'>" . htmlspecialchars($resource['resource_description']) . "</li>";
      }
    ?>
      </ul>
    <?php } ?>
</div>
