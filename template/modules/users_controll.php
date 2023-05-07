<?php
if (
    isset($_POST['name']) && isset($_POST['old_username']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])
    && $_POST['name'] != null && $_POST['username'] != null && $_POST['email'] != null && $_POST['password'] != null && $_POST['old_username']
) {
    update_user1($_POST['old_username'], $_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
    header("location:users_controll");
}

function get_title()
{
    return 'بخش ممنوعه | کنترل کاربران';
}
function  get_content()
{
    $users = get_all_users();

?>
    <style>
        body {
            background-color: whitesmoke !important;
            direction: rtl;
        }

        #footer {
            top: 50%;
        }

        #edit_name {
            height: 600px;
        }
    </style>

    <?php if (isset($_GET['job']) && isset($_GET['id'])) {






        $user = get_all_user_as_id($_GET['id'])
    ?>
        <div class="container" id="edit_name">

            <form method="POST">
                <label for="aaaaa">نام</label>
                <input type="text" class="form-control" name="name" id="aaaaa" value="<?php echo $user[0]['name'] ?>">
                <label for="bbbbb">نام کاربری</label>
                <input type="text" class="form-control" name="username" id="bbbbb" value="<?php echo $user[0]['username'] ?>">

                <label for="email">ایمیل</label>
                <input type="text" class="form-control" name="email" id="bbbbb" value="<?php echo $user[0]['email'] ?>">

                <label for="password">رمز</label>
                <input type="text" class="form-control" name="password" id="bbbbb" value="<?php echo $user[0]['password'] ?>">
                <input type="hidden" name="old_username" value="<?php echo $user[0]['username'] ?>">
                <button class="btn btn-primary">ویرایش</button>
            </form>

        </div>


















    <?php } else {
    ?>
        <br><br><br>


        <table class="table table-bordered table-hover container" id="slider_controll_table">
            <tr class="info">

                <th>نام </th>
                <th>نام کاربری </th>
                <th>رمز</th>
                <th>ایمیل</th>
                <th>عملیات</th>
                <th>نوع عضویت</th>
            </tr>
            <?php
            for ($i = 0; $i < count($users); $i++) {

            ?>
                <tr>

                    <td><?php echo $users[$i]['name'] ?></td>
                    <td><?php echo $users[$i]['username']  ?></td>
                    <td><?php echo $users[$i]['password']  ?></td>
                    <td><?php echo $users[$i]['email']  ?></td>

                    <td>

                        <a class="btn btn-sm btn-primary" href="users_controll?job=edit&id=<?php echo $users[$i]['id'] ?>">ویرایش</a>
                        <a class="btn btn-sm btn-danger" href="">حذف</a>

                    </td>
                    <td>
                        <select id="mySelect<?php echo $i ?>" onchange="alli(<?php echo $i ?>,<?php echo $users[$i]['id']?>)">
                            <option <?php if($users[$i]['type'] =='admin'){?>selected <?php }?> value="admin">مدیر</option>       
                            <option <?php if($users[$i]['type'] =='leader'){?>selected <?php }?> value="leader">ادمین</option>
                            <option <?php if($users[$i]['type'] =='user'){?>selected <?php }?> value="user">کاربر عادی</option>
                            
                        </select>
                    </td>
                </tr>

            <?php } ?>
        </table>

    <?php } 
    
    if (isset($_GET['type']) && isset($_GET['id'])) {
        echo '<br>';
        echo $_GET['type'];
        echo '<br>';
        echo  $_GET['id'];
       $type=$_GET['type'];
        change_user_type("$type", $_GET['id']);
    }
    ?>


    <pre>

    </pre>
<?php
}
?>
<script>
    function alli(number,id) {
        var x = document.getElementById("mySelect"+number).value;
        //alert(x)
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/top/users_controll?type="+x+"&id="+id);
        xhttp.send();
    }
</script>