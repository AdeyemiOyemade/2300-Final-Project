
<div class="country">
<?php if($getcountry!=$countryid){?>
  <a href="?country=<?php echo(htmlspecialchars($countryid))?>"><h2><?php echo htmlspecialchars($country) ?><span class="downarr">⌄</span></h2></a>

<?php }else{?>
  <a href="world.php"><h2><?php echo htmlspecialchars($country) ?><span class="downarr">⌃</span></h2></a>

    <figure>
    <img src="<?php echo htmlspecialchars($picturelink) ?>" alt="<?php echo htmlspecialchars($pic_alt)?>"/>

    <figcaption>Source: <a href="<?php echo htmlspecialchars($pic_source_link) ?>"><?php echo htmlspecialchars($pic_source) ?></a></figcaption>
    </figure>
    <ul>
    <?php
      $sql = "SELECT * FROM country_facts WHERE country_id = :id";
      $params = array(':id' => $countryid);
      $facts = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);

      foreach($facts as $fact){

          if($fact['fact'] == 'There are 5,648,002 total registered Syrian Refugees in the world right now:') {
            echo '<li class="term">'. htmlspecialchars($fact['fact']) .'</li>';
          }
          elseif($fact['term']==NULL){
            echo '<li>'. htmlspecialchars($fact['fact']) .'</li>';
          } elseif ($fact['term']=='There are 5,648,002 total registered Syrian Refugees in the world right now:'){
            echo '<li class="defn">' . htmlspecialchars($fact['fact']) .'</li>';
          }
          else{
            echo "<li class='term'>". htmlspecialchars($fact['term']) .'</li><li class="defn">'. htmlspecialchars($fact['fact']) .'</li>';
          }
      }
    ?>
      </ul>
    <?php } ?>
</div>
