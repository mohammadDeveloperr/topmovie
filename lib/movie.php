<?php
$connection=mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);


function get_all_movie()
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT * FROM movie");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}




function get_all_genre()
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT * FROM genre");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $rows=array_keys($row[0]);
    return $rows; 
}

function get_all_users()
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);                           
    $sql = ("SELECT * FROM `users`"); 
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}


function get_id_as_name($movie)
{

    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT id FROM movie WHERE name='$movie'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}




function get_name_as_id($id)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT name FROM movie WHERE id='$id'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}





function get_all_as_id($id)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT * FROM movie WHERE id='$id'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function get_all_user_as_id($id)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);                          //
    $sql = ("SELECT * FROM users WHERE id='$id'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function get_all_as_name($name)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT * FROM movie WHERE name='$name'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function get_all_as_English_name($name)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT * FROM movie WHERE name1='$name'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function get_genre($movie)
{

    $id = get_id_as_name($movie);


    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT * FROM genre WHERE movie_id=$id[id]");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $i = 0;
    $keys = array_keys($row[0]);
    $genre = [];

    foreach ($row[0] as $rows) 
    {
        // echo $keys[$i].'=>'. $rows .'<br>';
       
        if ($i > 1) {                                         //این برای اینکه دوتا خونه اول ارایه ایدی و فیلم ایدی ان
            if ($rows == 1) {                                 //یعنی اگه ژانری مقدارش یک بود
                array_push($genre, $keys[$i]);
            }
        }
        $i++;
    }
 
      return $genre;

}












function find_all_movie_in_genre($genre)
{
   
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT movie_id from genre WHERE $genre=1");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result);
    return $row;
}





function send_id($genre)
{
    $elem=array();
    $film=find_all_movie_in_genre($genre);
    for($i=0 ; $i < count($film) ; $i++)
    {
        array_push($elem,get_all_as_id( $film[$i][0]));
    }
   return $elem;
}



















                                                                 //my list


function get_my_list($user_id)
{


    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT movie_id FROM mylist WHERE users_id='$user_id'");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result);
    return $row;

}


function is_my_list($movie_id)
{


    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = ("SELECT users_id FROM mylist  WHERE movie_id=$movie_id ");
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;

}


function insert_in_my_list($user_id,$movie_id)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = 
    ("
       INSERT INTO mylist (users_id,movie_id) VALUES
       ('$user_id', '$movie_id');
   ");
   $result = mysqli_query($connection, $sql);
}

function delete_in_my_list($user_id,$movie_id)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

    $sql = 
    ("
    DELETE FROM mylist
    WHERE users_id = '$user_id' AND movie_id='$movie_id';
   ");
   $result = mysqli_query($connection, $sql);

}













function search1($text)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql=sprintf("select name from movie WHERE name1 LIKE '%%%s%%' ",
    mysqli_real_escape_string($connection,$text));
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result);
    return $row;
}


function search($text)
{
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql=sprintf("select name from movie WHERE name LIKE '%%%s%%' ",
    mysqli_real_escape_string($connection,$text));
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_all($result);
   
    return $row;
}
function get_movie_message($movie_id)
{
    $connection=mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql="select * from message where movie_id =$movie_id";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_all($result);
    return $row;
}

 function insert_message($user_id,$movie_id,$message)
 {
     $connection=mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
     $sql=sprintf("insert into message(user_id,movie_id,messagebox)VALUES(%s,%s,'%s')",mysqli_real_escape_string($connection,$user_id),mysqli_real_escape_string($connection,$movie_id),mysqli_real_escape_string($connection,$message));
     $result=mysqli_query($connection,$sql);
 }










 function get_all_message()
 {
    $connection=mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql="SELECT * FROM `message` ";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_all($result);
    return $row;
 }
 function delete_message($id)
 {
    global $connection; 

     $sql="DELETE FROM `message` WHERE id=$id";

     $result=mysqli_query($connection,$sql);


 }