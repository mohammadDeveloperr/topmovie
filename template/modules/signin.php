<?php
function get_title()
{
    return 'ثبت نام';
}
function get_content()
{
    
?>
    <style>
#footer
{
   top: 950px;
}
body
{
    background-image: radial-gradient(circle ,rgb(22, 93, 156),black  );
}
    </style>
    <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/login.css' ?>">
    <div id="signin-div">
        <br><br>
        <div id="signin-btn1"><a style="position:absolute;width:100%;right:0px;top:5px;color:white;text-decoration:none" href="<?php echo SITE_URL . '/login' ?>">ورود</a> </div>

        <br>
        <form method="POST" class="container" id="signin-form">
            <P id="signin-p"><b>ثبت نام</b></P>
            <label for="username"  id="signin-label"> : نام </label>
            <input type="text" class="form-control" id="signin-input" name="name">

            <label for="password"  id="signin-label1">:نام کاربری </label>
            <input type="text" class="form-control" id="signin-input" name="username">

            <label for="password"  id="signin-label2">: رمز</label>
            <input type="text" class="form-control" id="signin-input" name="password">

            <label for="password"  id="signin-label3">: ایمیل</label>
            <input type="text" class="form-control" id="signin-input" name="email">

            <br>
            <button class="btn btn-primary" id="signin-btn" name="login">send</button>
        </form>
        <div id="signin-message" class="message"></div>

    </div>
<?php
}



function process_inputs()
{

    if (!isset($_POST['login'])) {
        return;
    }

    if (isset($_POST['username'])) {
        $username =trim(stripslashes(htmlspecialchars($_POST['username'])))   ;
    }

    if (empty($username)) {
        add_message('signin-message', 'نام کاربری نمی تواند خالی باشد.');
        return;
    }

    if (isset($_POST['password'])) {
        $password =trim(stripslashes(htmlspecialchars($_POST['password']))) ;
        $password = $password;
    }

    if (strlen($password) < 4  ) {
        add_message('signin-message', 'رمز عبور باید از 4 کاراکتر بیشتر باشد');
      
        return;
    }





    if (isset($_POST['name'])) {
        $name =trim(stripslashes(htmlspecialchars($_POST['name']))) ;
    }

    if (empty($name)) {
        add_message('signin-message', 'نام نمیتواند خالی باشد.');
        return;
    }




    if (isset($_POST['email'])) {
        $email =trim(stripslashes(htmlspecialchars($_POST['email']))) ;
        $email_check=filter_var($email,FILTER_VALIDATE_EMAIL);
        if(!$email_check)
        {
            add_message('signin-message', 'ایمیل اشتباه است');
            return;
        }
    }

    if (empty($email)) {
        add_message('signin-message', 'فامیل نمیتواند خالی باشد.');
        return;
    }

    $userdata = ['username' => $username, 'password' => $password, 'name' => $name, 'email' => $email];
    $replace_user = add_user($userdata);
    if ($replace_user == 'true') {
        user_login($username, $password);
        redirect_to(home_url('/home'));
    } else {
        add_message('signin-message', 'نام کاربری قبلا انتخاب شده');
    }
}
