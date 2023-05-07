<?php 
delete_in_page();

function get_title()
{
    return "بخش ممنوعه|کنترل فیلم ها";
}
function get_content()
{
    ?>
  <style>
  #footer
  {
      top: 50%;
  }
  body
  {
      background-color: whitesmoke;
      direction: rtl;
  }
  #link_add_movie
  {
      position: relative;
      float: right;
      top: 5%;
      right: 12.5%;
  }
  </style>

<table class="table table-bordered table-hover container"id="slider_controll_table">
        <tr class="info">
            
            
            <th>نام  فیلم</th>
            <th>عملیات</th>
        </tr>
        <?php $names=get_all_name();
        for($i=0;$i<count($names);$i++)
        {
        ?>
        <tr>
            <td><?php echo $names[$i][0]?></td>
            <td>
            <a class="btn btn-sm btn-primary" href="addFilm?name=<?php echo $names[$i][0];?>">ویرایش</a>
            <a class="btn btn-sm btn-danger" href="movies_list?job=delete&name=<?php echo $names[$i][0] ?>">حذف</a>
            </td>
        </tr>
<?php }?>
    </table>
    <a class="btn btn-sm btn-primary container " id="link_add_movie" href="addFilm">اضافه کردن</a>
<pre>

</pre>

    <?php
    
        }

        function delete_in_page()
        {
            if(isset($_GET['job']))
            {
                delete_movie($_GET['name']);
                redirect_to(home_url("/movies_list"));
                
                
            }
        }