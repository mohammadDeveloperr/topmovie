<?php
//error_reporting(E_ALL & ~E_WARNING);
function get_title()
{
    return 'دانلود فیلم و سریال | تاپ مووی';
}
function get_content()
{
    $slider_list = select_slider_list();


    $movie = get_all_movie();
?>
    <style>
        .div-hover {
            margin-left: 150px;
        }
    </style>
    <?php
    ?>
    <link rel="stylesheet" href="<?php echo SITE_URL ?>/includes/css/slider.css ">
    <script src="<?php echo SITE_URL; ?>/includes/js/slider.js"></script>

    <script>
        slider('next', 'prev', 'li')
    </script>

    <div id="slider">
        <div id="next">></div>
        <div id="prev">
            < </div>


                <ul id="ul">

                    <?php

                    for ($i = 0; $i < count($slider_list); $i++) {
                    ?>
                        <li class="li" id="l1" style="background-image:url('<?php echo SITE_URL . "/includes/" . $slider_list[$i][0] . ".jpg" ?>');">
                            <?php
                            slider_information($slider_list[$i][0]);
                            ?>
                        </li>
                    <?php
                    }
                    ?>

                </ul>

        </div>



        <?php                                                                                                       //

        if (isset($_SESSION['type']) &&     $_SESSION['type'] == 'admin' || $_SESSION['type'] == 'leader') { ?>
            <a href="movies_list" class="btn btn-success" id="movie-controll">کنترل فیلم ها</a>
            <a href="slider_controll?type=home" class="btn btn-primary" id="movie-controll">کنترل اسلایدر اصلی</a>
            <a href="slider_controll?type=serial" class="btn btn-success" id="movie-controll">کنترل اسلایدر سریال</a>

            <a href="message" class="btn btn-primary" id="movie-controll">کنترل نظرات</a>
        <?php }
        if (isset($_SESSION['type']) &&     $_SESSION['type'] == 'admin') {
        ?>

            <a href="users_controll" class="btn btn-success" id="movie-controll">کنترل کاربران</a>


        <?php

        }

        ?>







        <br><br><br><br><br><br><br><br><br><br><br>


























        <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/card slider.css' ?> ">
        <script src="<?php echo SITE_URL . '/includes/js/card slider.js'; ?>"></script>

        <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/hover.css' ?> ">
        <script src="<?php echo SITE_URL . '/includes/js/hover.js'; ?>"></script>

        <?php $genres = get_all_genre();

        for ($u = 2; $u < count($genres); $u++) {
            $films = send_id($genres[$u]);
            if (!$films) {
                continue;
            }
        ?>
            <h3 class="h3"><?php echo $genres[$u]; ?></h3>
            <script>
                if (innerWidth > 900)
                    card_slider(7, '<?php echo $genres[$u] ?>', '<?php echo $genres[$u] . 'next' ?>', '<?php echo $genres[$u] . 'prev' ?>')
                else if (innerWidth < 900)
                    card_slider(2, '<?php echo $genres[$u] ?>', '<?php echo $genres[$u] . 'next' ?>', '<?php echo $genres[$u] . 'prev' ?>')
            </script>



            <div id="<?php echo $genres[$u] ?>" class="card-slider">

                <a class="control-next" id="<?php echo $genres[$u] . 'next' ?>">*</a>

                <a class="control-prev" id="<?php echo $genres[$u] . 'prev' ?>">*</a>


                <ul id='ul'>


                    <?php


                    for ($i = 0; $i < count($films); $i++) {
                    ?>
                        <a href="movies?name=<?php echo  $films[$i][0]['name'] ?>">
                            <li class="cards" id="<?php echo $films[$i][0]['name1'] ?>" style="background-image: url('<?php echo SITE_URL . "/includes/" . $films[$i][0]['name1'] . " small.jpg"  ?>');">

                                <p class="div-hover">
                                    <br>
                                     <span class="movie-or-serial"><b><?php echo  $films[$i][0]['type']=='serial'?"سریال":"فیلم" ?></b></span>
                                   <br><br>
                                    <span class="year"><?php echo $films[$i][0]['year'] ?>
                                    </span>

                                    <br><br>
                                    <span class="hover-like">
                                        <?php echo $films[$i][0]['likes'] ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="hover-likes" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                        </svg>
                                    </span>

                                    <br><br>
                                    <span class="imdb"><?php echo $films[$i][0]['IMDB'] ?><b style="margin-left: 3px;">IMDB</b></span>
                                </p>
                                <div class="hover" id="hover">
                                </div>

                                <span class="span-name"><i><?php echo $films[$i][0]['name'] ?></i></span>
                            </li>
                        </a>



                    <?php } ?>
                    <br><br>
                    <li class="cards hidden-cards"></li>
                </ul>

            </div>


            <br>


    <?php

        }
    }
