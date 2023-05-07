<?php 
function get_title()
{
    return 'حساب کاربری';
}
function get_content()
{
    ?>
<style>
body
{
    background-color: rgb(242, 242, 242);
}
#user-information
{
    position: relative;
    background-color: white;
    width: 400px;
    height: 300px;
   border-radius: 20px;
   box-shadow: 2px 2px 2px 2px rgb(0, 0, 0,0.1);
   top: 100px;
text-align: right;
direction: rtl;
}
#h1-in-account
{
    font-size: 20px;
    position: relative;
    float: left;
    left: 700px;
    top: 50px;
}
#user-information p
{
    margin-right: 12px;
}
.Edit
{
    color: #1993ff;
    
    margin-right: 20px;
}
#footer
{
   top: 40%;
}
</style>

<?php $user=get_user($_SESSION['username'])?>
<h1 id="h1-in-account" >حساب کاربری</h1>
<div id="user-information" class="container">
    <br>
<p>نام :<?php echo $user['name']?> </p>
<br>
<p>نام کاربری : <?php echo $user['username']?></p>
<br>
<p>ایمیل : <?php echo $user['email']?> </p>

<a href="editname" class="Edit">ویرایش</a>
<br><br>
<a href="editpassword" class="Edit">تغییر رمز عبور</a>
</div>
    <?php 
}