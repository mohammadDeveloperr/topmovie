<?php
function get_title()
{
    return 'movie';
}

function get_content()
{
?>
    <style>
        #erorr-div {
            background-color: red;
            text-align: center;
            width: 50%;
            margin-left: 25%;
            margin-top: 10%;
            height: 7%;
            border-radius: 10px;
            color: white;
            padding-top: 0.7%;
        }
    </style>
    <?php
    if (isset($_GET['name'])) {


    ?>

        <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/movie-page.css' ?>">
        <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/message.css' ?>">
        <?php
        $get = $_GET['name'];

        $movie = get_all_as_name("$get");
        if (isset($movie[0]['name'])) {
            $genre = get_genre($movie[0]['name']);
            //   echo '<pre>';
            //     print_r($all);
            //     echo '</pre>';
            //     echo '<br>'.$all[0]['name1']

            movie_page($movie, $genre);


        ?> <script src="<?php echo SITE_URL . '/includes/js/message.js' ?>"></script>

        <?php
        } else {
        ?>

            <div id="erorr-div">این فیلم در سایت قرار نگرفته است </div>


<?php
        }
    }
}
