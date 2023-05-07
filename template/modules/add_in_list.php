<?php 
function get_content()
{
  
}


function process_inputs() 
{
      if($_GET['job']=='add')
    {
      //  echo "<p style='color:white;'>hello </ph>";
          $movie_id=$_GET['movie_id'];
          //echo $movie_id;
          $all=get_all_as_id($movie_id);
          header("location:".SITE_URL."/movies?name=".$all[0]['name']."");
          insert_in_my_list($_SESSION['user_id'],$movie_id);
          //echo $d[0]['name'];
    }
    elseif($_GET['job']=='delete')
    {
        $movies_id=$_GET['movie_id'];
        $all=get_all_as_id($movies_id);
        //echo $movies_id;
        header("location:".SITE_URL."/movies?name=".$all[0]['name']."");
        delete_in_my_list($_SESSION['user_id'],$movies_id);
    }
    else
    {

    }
}