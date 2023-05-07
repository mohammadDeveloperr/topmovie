<?php
function get_title()
{
    return 'ویرایش پروفایل';
}
function get_content()
{
?>
    <style>
        body {
            background-color: rgb(242, 242, 242);
        }
    </style>

    <?php $user = get_user($_SESSION['username']) ?>
    <h1 id="edit-name-h1">ویرایش نام و نام کاربری</h1>
    <div id="edit_name" class="container">
        <form method="POST">
            <label for="aaaaa">نام</label>
            <input type="text" class="form-control" name="name" id="aaaaa" value="<?php echo $user['name']?>">
            <label for="bbbbb">نام کاربری</label>
            <input type="text" class="form-control" name="username"id="bbbbb" value="<?php echo $user['username']?>">
            <button class="btn btn-primary">ویرایش</button>
        </form>
    </div>
    <div id="edit-name-message1" class="container"></div>
<?php
}
function process_inputs()
{
    if(isset($_POST['name']) && isset($_POST['username']) && $_POST['name']!=null && $_POST['username']!=null)
{
    update_user($_SESSION['username'],trim(stripslashes(htmlspecialchars($_POST['name']))),trim(stripslashes(htmlspecialchars($_POST['username']))));
    user_login(trim(stripslashes(htmlspecialchars($_POST['username']))),$_SESSION['password']);
    redirect_to(home_url());
}
elseif(isset($_POST['name']) && isset($_POST['username']) && ($_POST['name']==null || $_POST['username']==null) )
{
    add_message("edit-name-message1","فیلد ها نمیتواند خالی باشد");
}
}