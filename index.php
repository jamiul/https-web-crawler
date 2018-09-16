<?php
include 'getData.php';
 $filename = "https://www.imdb.com/title/tt2975590/?ref_=nv_sr_1";
 #file_get_contents($filename);
 $content = getData($filename);
 #title
 
 $explode_content = explode('<h1 class="">',$content);
 $title_explode_content = explode('<span id="titleYear">',$explode_content[1]);
 $title = $title_explode_content[0];
 #echo "<strong>Upcoming Movie : </strong>".$title."</br>";
 
 /*Ratting*/
 $rating_content = explode('<span>',$content);
 $rating_explode_content = explode('</span>',$rating_content[1]);
 $ratings = $rating_explode_content[0];
 #echo "<strong>Ratting : </strong>".$ratings."</br>";
 
 //rating people count
  $rating_count = explode('<span class="small">', $content);
  $rating_count_people = explode('</span>', $rating_count[1]);
  $rating_people_count = $rating_count_people[0];
  #echo "<strong>Rating people count : </strong>".$rating_people_count."</br>";
  
  //image
  $image_find = explode('<div class="poster">', $content);
  $image_find_1 = explode('src="', $image_find[1]);
  $image_find_2 = explode('"', $image_find_1[1]);
  $image_src = $image_find_2[0];
  echo "<img src='".$image_src."' /></br>";

  file_put_contents( $title.'.jpg', file_get_contents($image_src));
  echo "<strong>Upcoming Movie : </strong>".$title."</br>";
  echo "<strong>Ratting : </strong>".$ratings."</br>";
  echo "<strong>Rating people count : </strong>".$rating_people_count."</br>";
 
 
?>