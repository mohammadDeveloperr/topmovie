<?php
function get_title()
{
    return 'تغییر رمز عبور';
}
function get_content()
{
?>
    <style>
        body {
            background-color: rgb(242, 242, 242);
        }

#footer
{
    top: 700px;
}
    </style>

    <?php $user = get_user($_SESSION['username']) ?>
    <h1 id="edit-password-h1">تغییر رمز عبور</h1>
    <div id="edit_password" class="container">
        <form method="POST">
            <label for="aaaaa">رمز عبور فعلی</label>
            <input type="text" class="form-control" name="old-password" id="aaaaa">
            <label for="bbbbb">رمز عبور جدید</label>
            <input type="text" class="form-control" name="new-password" id="bbbbb">
            <label for="ccccc">تکرار رمز عبور جدید</label>
            <input type="text" class="form-control" name="replace-new-password" id="ccccc">
            <button class="btn btn-primary">تغییر رمز عبور</button>
        </form>

    </div>
    <div id="edit-name-message" class="container"></div>
<?php
}
function process_inputs()
{

    if (isset($_POST['old-password'])) 
    {
        if ($_POST['old-password'] === $_SESSION['password']) {
            if ($_POST['new-password'] != null && strlen($_POST['new-password']) > 4) 
            {
                if ($_POST['new-password'] == $_POST['replace-new-password'])
                {
                    update_user_password($_SESSION['username'], trim(stripslashes(htmlspecialchars($_POST['new-password']))));
                    user_login($_SESSION['username'],trim(stripslashes(htmlspecialchars( $_POST['new-password']))));
                    redirect_to(home_url());
                } 
                else 
                {
                    add_message('edit-name-message', 'تکرار رمز عبور متفاوت است');
                }
            }
             else 
            {
                add_message('edit-name-message', 'رمز عبور باید از 4 کاراکتر بیشتر باشد');
            }
        } 
        else 
        {
            add_message('edit-name-message', 'رمز عبور فعلی صحیح نیست');
        }
    }
}
