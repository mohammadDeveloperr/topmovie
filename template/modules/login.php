<?php
function get_title()
{
    return 'ورود به اکانت';
}
function get_content()
{
?>
<style>
    #footer
{
   top: 900px;
}
body
{
    background-image: radial-gradient(circle ,rgb(22, 93, 156),black  );
}
</style>
<link rel="stylesheet" href="<?php echo SITE_URL.'/includes/css/login.css' ?>">
    <div id="login-div">
<br><br>
<div id="signin-btn1"><a style="position:absolute;width:100%;right:0px;top:5px;color:white;text-decoration:none" href="signin">ثبت نام</a> </div>
<br>
        <form action="" method="POST" class="container" id="form-login">
            <P id="login-p">ورود به اکانت</P>
            <label for="number" id="login-label1" >: نام کاربری </label>
            <input type="text" class="form-control" id="login-input" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>">

            <label for="password"id="login-label2" >: رمز </label>
            <input type="text" class="form-control" id="login-input" name="password">

            <br>
            <button type="submit" class="btn btn-primary" id="login-btn" name="login">send</button>
        </form>
        <div id="login-message" class="message"></div>
    </div>

<?php
}



function process_inputs() 
{
    
    if(!isset($_POST['login'])) {
        
        return;
    }
    
    if(isset($_POST['username'])) {
        $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
    }

    if(empty($username)) {
        
        add_message('login-message','نام کاربری نمیتواند خالی باشد');
        return;
    }
    
    if(isset($_POST['password'])) {
        $password =trim(stripslashes(htmlspecialchars( $_POST['password'])));
    }
    
    if(empty($password)) {
        ?>

        <?php 
        add_message('login-message','رمز عبور نمی تواند خالی باشد.');
        return;
    }
    
    user_login($username, $password);
    
    if(!is_user_logged_in()) {
        add_message('login-message','نام کاربری یا رمز عبور، اشتباه است.');
    } else {
        redirect_to(home_url());
       
    }
    
}