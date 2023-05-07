<?php
    function render_page()
    {
        if (function_exists('process_inputs')) {
            process_inputs();
        }

        include_once('template/header.php');
    
        if (function_exists('get_content')) {
            get_content();
        }
        show_messages();
        include_once('template/footer.php');
    }


    function load_module()
    {

        $module = get_module_name();
   // echo $module;
        if (empty($module)) {
            $module = 'home';
        }

         if(($module=='/addFilm' ||$module=='/movies_list'||$module=='/slider_controll') && (!isset($_SESSION['type']) ||isset($_SESSION['type'])&& $_SESSION['type']!='admin' && $_SESSION['type']!='leader' ))                                // 
         {
             $module='home';
         }
        if($module=='/users_controll' && (isset($_SESSION['type'])&& $_SESSION['type']!='admin'||!isset($_SESSION['type'])))               //
        {
            $module='home';
        }
        if(isset($_SESSION['username']) && ($module == '/login' || $module == '/signin'))
        {
        
        $module='home';
        }
        // if(isset($_SESSION['username']) && $module == '/signin')
        // {

        //    $module='home';
        // }

        // if(!isset($_SESSION['username']) && $module == '/bookmarks')
        // {
        // $module='login';
        // }

        if(!isset($_SESSION['username']) && ($module == '/account' || $module == '/bookmarks' || $module == '/editname' || $module == '/editpassword'))
        {
        $module='login';
        }

        $module_file = "template/modules/$module.php";



        if (file_exists($module_file)) {

            require_once("template/modules/$module.php");
        } else {
            add_message('آدرس وارد شده، صحیح نیست.', 'error');
            require_once("template/modules/home.php");
        }

        render_page();
    }





    $message1=[];


    function add_message($id,$message)
    {
    global $messages1;
    $messages1[] = array(
        'message' => $message,
        'id' => $id,
    );

    }









    function show_messages()
    {
    
    global $messages1;
    if(empty($messages1)) 
    {
        return;
    }
    
    foreach($messages1 as $item) 
    {
        $message = $item['message'];
        ?>
        <script>document.getElementById('<?php echo $item['id']?>').innerHTML="<?php echo $item['message']?>"</script>
        <?php

    }

    }
