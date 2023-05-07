<?php

function get_title()
{
    return 'لیست من';
}
function get_content()
{
    $movie = get_all_movie();


    $slider_list = select_series_slider_list();
?>
    <style>
        #footer {
            top: 50% !important;
        }
    </style>

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









        <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/card slider.css' ?> ">
        <script src="<?php echo SITE_URL . '/includes/js/card slider.js'; ?>"></script>

        <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/hover.css' ?> ">
        <script src="<?php echo SITE_URL . '/includes/js/hover.js'; ?>"></script>





        <?php $genres = get_all_genre();

        for ($u = 2; $u < count($genres); $u++) {
            $check1 = false;

            $films = send_id($genres[$u]);
            if (!$films) {
                continue;
            }




            for ($i = 0; $i < count($films); $i++) {
                if ($films[$i][0]['type'] == 'serial') {
                    $check1 = true;
                }                                //کار این دوتا اینه که چک میکنه تو هر ژانر اگه سریال نبود اون ژانر رو رد کنه و نمایش نده
            }
            if (!$check1)
                continue;





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
                        if ($films[$i][0]['type'] != 'serial')
                            continue;
                    ?>
                        <a href="movies?name=<?php echo $films[$i][0]['name'] ?>">
                            <li class="cards" id="<?php echo $films[$i][0]['name1'] ?>" style="background-image: url('<?php echo SITE_URL . "/includes/" . $films[$i][0]['name1'] . " small.jpg"  ?>');">

                                <p class="div-hover">

                                    <br>
                                    <span class="movie-or-serial"><b><?php echo  $films[$i][0]['type'] == 'serial' ? "سریال" : "فیلم" ?></b></span>
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

        <?php

        }
        ?>
        <!-- <pre style="color: white;"> -->
    <?php

    // for ($i = 0; $i < count($movie); $i++) {
    //     if ($movie[$i]['type'] == 'serial')
    //         print_r($movie[$i]);
    // }
}
