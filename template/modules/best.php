<?php
function get_title()
{
    return 'برترین ها';
}
function get_content()
{
?>
   
    <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/hover.css' ?> ">
    <script src="<?php echo SITE_URL . '/includes/js/hoverCards.js'; ?>"></script>
<br>
<h3 class="movie-list-h3">برترین ها</h3>
<br>
    <div id="movie-list">
        <?php
       $movies=send_id('برترین');
        for ($i = 0; $i < count($movies); $i++) {
            //$movie = get_all_as_id($movies[$i][0]);
        ?>
            <div id="movie-in-list" class="cards" style="background-image: url('<?php echo SITE_URL . "/includes/" . $movies[$i][0]['name1'] . " small.jpg"  ?>');">

                <p class="div-hover">

                    <br><br><br>
                    <span class="year"><?php echo $movies[$i][0]['year']; ?>
                    </span>

                    <br><br>
                    <span class="hover-like">
                    <a href=""></a>
                        <?php echo $movies[$i][0]['likes']; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="hover-likes" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                    </span>

                    <br><br>
                    <span class="imdb"><?php echo $movies[$i][0]['IMDB']; ?><b style="margin-left: 3px;">IMDB</b></span>
                </p>
                <span class="box-name"><?php echo $movies[$i][0]['name'] ?></span>
                <div class="hover" id="hover">
                </div>
            </div>
            



        <?php } ?>
    </div>

<?php
// $dd=find_all_movie_in_genre('برترین');
//  echo '<pre>';
//  print_r($dd);
//  echo '</pre>';
}