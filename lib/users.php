<?php


function get_user($username)
{
    if (!$username) {
        return null;
    }

    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

    $sql = sprintf("
        SELECT *
        FROM users
        WHERE username = '%s'
    ",mysqli_real_escape_string($connection,$username));
    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($result);
    return $row;
}



function get_user_as_id($user_id)
{
$connection=mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
$sql="select name from users where id = $user_id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
return $row;
}




function user_exists($username) {
    $user = get_user($username);
    return isset($user['id']);
}













function update_user($old_username,$name,$new_username)
{

    // if(!$username) {
    //     return;
    // }
    
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = 
         sprintf("
            UPDATE users
            SET  username = '%s', name = '%s'
            WHERE username = '%s';
        ",mysqli_real_escape_string($connection,$new_username),mysqli_real_escape_string($connection,$name),mysqli_real_escape_string($connection,$old_username));
        $result = mysqli_query($connection, $sql);
        
}


// function update_user1($old_username,$name,$new_username,$email,$password)                                                          
// {

    
//     $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
//         $sql = 
//          sprintf("
//             UPDATE users
//             SET  username = '%s', name = '%s',email = '%s',password = '%s'
//             WHERE username = '%s';
//         ",mysqli_real_escape_string($connection,$new_username),mysqli_real_escape_string($connection,$name),
//         mysqli_real_escape_string($connection,$email),mysqli_real_escape_string($connection,$password),mysqli_real_escape_string($connection,$old_username)
// );

//         $result = mysqli_query($connection, $sql);
        
//         print_r(mysqli_error($connection));
// }



function update_user1($old_username,$name,$new_username,$email,$password)                                                          
{

    
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = 
   " UPDATE users
   SET  username = '$new_username', name = '$name',email = '$email',password = $password
   WHERE username = '$old_username';
   ";

        $result = mysqli_query($connection, $sql);
        
        print_r(mysqli_error($connection));
}




function update_user_password($username,$password)
{

    // if(!$username) {
    //     return;
    // }
    
    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = 
         sprintf("
            UPDATE users
            SET  password = '%s'
            WHERE username = '%s';
        ",mysqli_real_escape_string($connection,$password),mysqli_real_escape_string($connection,$username));
        $result = mysqli_query($connection, $sql);
        
}









    function add_user($userdata)
{

    $username = $userdata['username'];
    if(!$username) {
        return;
    }
    
    $password = $userdata['password'];
    $username = $userdata['username'];
    $name = $userdata['name'];
    $email=$userdata['email'];
    
    global $db;

    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

    if (!user_exists($username)) {

        $sql = 
        sprintf("
            INSERT INTO users (name, password, username, email) VALUES
            ('%s', '%s', '%s', '%s');
        ",mysqli_real_escape_string($connection,$name),mysqli_real_escape_string($connection,$password),
        mysqli_real_escape_string($connection,$username),mysqli_real_escape_string($connection,$email));
        $result = mysqli_query($connection, $sql);
        return 'true';
    } 
    else 
    {
      return 'false';
    }


}













function change_user_type($user_type,$id)                                                                      
{
global $connection;

$sql="UPDATE `users` SET `type`='$user_type' WHERE id=$id ";
$result = mysqli_query($connection, $sql);
print_r(mysqli_error($connection));
}