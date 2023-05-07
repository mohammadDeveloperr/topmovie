<?php 
if(isset($_GET['job']) && $_GET['job']!=null && isset($_GET['id']) && $_GET['id']!=null)
{
delete_message($_GET['id']);
header("location:message");
}



function get_title()
{
    return 'بخش ممنوعه | کنترل نظرات';
}

function  get_content()
{
    $message=get_all_message();
    ?>
<style>
body
  {
      background-color: whitesmoke !important;
      direction: rtl;
  }
  #footer
  {
      top: 50%;
  }
</style>



<table class="table table-bordered table-hover container"id="slider_controll_table">
        <tr class="info">
            
            <th>نام کاربر</th>
            <th>نام فیلم </th>
            <th>نظر مورد نظر</th>
            <th>عملیات</th>
        </tr>
        <?php 
        for($i=0;$i<count($message);$i++)
        {
            $username=get_user_as_id($message[$i][1]);
            $movie=get_name_as_id($message[$i][2])
        ?>
        <tr>

            <td><?php print_r($username['name']) ?></td>
            <td><?php print_r($movie['name']) ?></td>
            <td><?php echo $message[$i][3]?></td>
            <td>
            <a class="btn btn-sm btn-danger" href="message?job=delete&id=<?php echo $message[$i][0] ?>">حذف</a>
            </td>
        </tr>
<?php }?>
    </table>



    <pre>
    <?php 
      
      //print_r($message[1][3]);
    ?>
    </pre>
<?php
}

