<?php 
function add_movie($name,$name1,$year,$IMDB,$likes,$stars,$director,$explan,$information,$country,$subtitle,$movie_or_serial,$season)
{
       $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = 
         ("
           INSERT INTO movie(name,name1,year,IMDB,likes,stars,director,explan,information,country,subtitle,type,season)
           VALUES('$name','$name1',$year,$IMDB,$likes,'$stars','$director','$explan','$information','$country','$subtitle','$movie_or_serial',$season)
        ");
        $result = mysqli_query($connection, $sql);
        print_r(mysqli_error($connection));
   
}


function update_movie($name,$name1,$year,$IMDB,$likes,$stars,$director,$explan,$information,$country,$subtitle,$movie_or_serial,$season,$old_name)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql=
  ("
  UPDATE movie SET name='$name',name1='$name1',year=$year,IMDB=$IMDB,likes=$likes,stars='$stars',director='$director',explan='$explan',
  information='$information',country='$country',subtitle='$subtitle',type='$movie_or_serial',season=$season
   WHERE name='$old_name';
  ");
  $result = mysqli_query($connection, $sql);
  print_r(mysqli_error($connection));
}

function add_genre($move_id,$action,$tarsnak,$dram,$fun,$love,$jenaie,$majarajoie,$elmi,$mostanad,$family,$anime,$animation,$best)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
     INSERT INTO genre( `movie_id`, `اکشن`, `ترسناک`, `درام`, `کمدی`, `عاشقانه`, `جنایی`, `ماجراجویی`, `علمی تخیلی`, `مستند`, `خانوادگی`, `انیمی`, `انیمیشن`, `برترین`)
     VALUES($move_id,$action,$tarsnak,$dram,$fun,$love,$jenaie,$majarajoie,$elmi,$mostanad,$family,$anime,$animation,$best);
  ");
  $result = mysqli_query($connection, $sql);
  print_r(mysqli_error($connection));

}





















function add_in_slider($name)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   INSERT INTO `slider`(`name`) VALUES ('$name');
  ");
  $result = mysqli_query($connection, $sql);
  print_r(mysqli_error($connection));
}

function add_in_serial_slider($name)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   INSERT INTO `series_slider`(`name`) VALUES ('$name');
  ");
  $result = mysqli_query($connection, $sql);
  print_r(mysqli_error($connection));
}



function select_slider_list()
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   SELECT name FROM slider
  ");
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_all($result);
  return $row;
}


function select_series_slider_list()
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);                           //
  $sql = 
   ("
   SELECT name FROM series_slider
  ");
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_all($result);
  return $row;
}


function delete_slider_list($name)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   DELETE FROM series_slider
   WHERE name = '$name';");
  $result = mysqli_query($connection, $sql);
print_r(mysqli_error($connection));
}

function delete_serial_slider_list($name)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   DELETE FROM series_slider
   WHERE name = '$name';");
  $result = mysqli_query($connection, $sql);
print_r(mysqli_error($connection));
}




function get_all_name()
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   SELECT name FROM movie
  ");
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_all($result);
  return $row;
}









function delete_movie($name)
{
  delete_genre_film($name);
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   DELETE FROM movie
   WHERE name = '$name';");
  $result = mysqli_query($connection, $sql);
print_r(mysqli_error($connection));
}

function delete_genre_film($name)
{
$movie_id=get_id_as_name($name);
$movie_id=$movie_id['id'];
$connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
$sql = 
 ("
 DELETE FROM genre
 WHERE movie_id = $movie_id");
$result = mysqli_query($connection, $sql);
print_r(mysqli_error($connection));
}








function get_all_movie_as_name($name)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   SELECT * FROM movie where name='$name';
  ");
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
  return $row;
}

function update_genre($move_id,$action,$tarsnak,$dram,$fun,$love,$jenaie,$majarajoie,$elmi,$mostanad,$family,$anime,$animation,$best)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

$sql=
("

UPDATE `genre` SET `اکشن`=$action,`ترسناک`=$tarsnak,`درام`=$dram,
`کمدی`=$fun,`عاشقانه`=$love,`جنایی`=$jenaie,`ماجراجویی`=$majarajoie,`علمی تخیلی`=$elmi,
`مستند`=$mostanad,`خانوادگی`=$family,`انیمی`=$anime,
`انیمیشن`=$animation,`برترین`=$best WHERE movie_id=$move_id
");
$result = mysqli_query($connection, $sql);
print_r(mysqli_error($connection));
}


function add_link($name,$link,$link_number,$movie_id)
{
  $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  $sql = 
   ("
   INSERT INTO `link`( `name`, `link`, `link_id`, `movie_id`) VALUES ($name,$link,$link_number,$movie_id)
  ");
  $result = mysqli_query($connection, $sql);
  print_r(mysqli_error($connection));
}
