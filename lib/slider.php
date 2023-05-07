<?php

function slider_information($movies)
{
  // echo $movies;
  $movie = get_all_as_English_name("$movies");
  //print_r($movie);
  $movie = $movie[0];
?>
  <div id="explan-slider" class="explan-slider">

    <h2>
      <?php echo $movie['name'];  ?>
    </h2>
    <br>
    <p id="explans-slider"><?php echo $movie['explan'];  ?></p>


    <br>

    <div id="link-slider"><a href="<?php echo SITE_URL . '/movies?name=' . $movie['name'] ?> " class="go-for-download">اطلاعات بیشتر</a></div>
    <!-- <div id="information-slider"><a href="<?php //echo SITE_URL . '/movies?name=' . $movie['name'] 
                                                ?>">اطلاعات بیشتر</a></div> -->
    <br>
    <div id="stars-slider">ستارگان : <?php echo $movie['stars']; ?>
      <br><br>
      کارگردان : <?php echo $movie['director']; ?>

    </div>
  </div>


  <div class="reponsive-explan-slider">
    <h5><?php echo $movie['name'] ?></h5>
    <br>
    <div id="link-slider-responsive">
      <a href="<?php echo SITE_URL . '/movies?name=' . $movie['name'] ?> " class="go-for-download">اطلاعات بیشتر</a>
    </div>
  </div>
<?php
}





function series_slider_information($movies)
{
  // echo $movies;
  $movie = get_all_as_English_name("$movies");
  //print_r($movie);
  $movie = $movie[0];
?>
  <div id="explan-slider" class="explan-slider">

    <h2>
      <?php echo $movie['name'];  ?>
    </h2>
    <br>
    <p id="explans-slider"><?php echo $movie['explan'];  ?></p>


    <br>

    <div id="link-slider"><a href="<?php echo SITE_URL . '/movies?name=' . $movie['name'] ?> " class="go-for-download">اطلاعات بیشتر</a></div>
    <!-- <div id="information-slider"><a href="<?php //echo SITE_URL . '/movies?name=' . $movie['name'] 
                                                ?>">اطلاعات بیشتر</a></div> -->
    <br>
    <div id="stars-slider">ستارگان : <?php echo $movie['stars']; ?>
      <br><br>
      کارگردان : <?php echo $movie['director']; ?>

    </div>
  </div>


  <div class="reponsive-explan-slider">
    <h5><?php echo $movie['name'] ?></h5>
    <br>
    <div id="link-slider-responsive">
      <a href="<?php echo SITE_URL . '/movies?name=' . $movie['name'] ?> " class="go-for-download">اطلاعات بیشتر</a>
    </div>
  </div>
<?php
}


function movie_information($movie)
{
?>
  <style>
    a:hover {
      color: white;
    }

    #my-list-a {
      left: 0px;
      color: white;
      position: absolute;
      width: 100%;
      height: 100%;
    }
  </style>
  <div id="explan-slider">

    <h2>
      <?php echo $movie['name'];  ?>
    </h2>
    <br>
    <p id="explans-slider"><?php echo $movie['explan'];  ?></p>


    <br>

    <div id="link-slider" style="width: 100px;"><a href="#">دانلود فیلم</a></div>

    <?php $is_in_list = is_my_list($movie['id']);
    // echo '<pre>';
    // print_r($is_in_list);
    if ($is_in_list == null) {
    ?>

      <div id="my-list"><a id="my-list-a" href="<?php echo home_url("/add_in_list?job=add&movie_id=" . $movie['id']) ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" style="margin-top: 7px;color:white;" height="26" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          </svg></a></div>
    <?php } elseif ($is_in_list != null) {
    ?>
      <div id="my-list"><a id="my-list-a" style="" href="<?php echo home_url("/add_in_list?job=delete&movie_id=" . $movie['id']) ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" style="margin-top:10px" height="20" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z" />
          </svg></a>
      </div>
    <?php } ?>
    <br>
    <div id="stars-slider">ستارگان : <?php echo $movie['stars']; ?>
      <br><br>
      کارگردان : <?php echo $movie['director']; ?>

    </div>
  </div>
<?php
}




function movie_page($movie, $genre)
{
?>
  <div id="movie-image" style="background-image:url('<?php echo SITE_URL . "/includes/" . $movie[0]['name1'] . ".jpg" ?>"><?php movie_information($movie[0]) ?></div>

  <br><br><br><br><br>

  <div id="movie-information">
    <p id="name1"><?php echo $movie[0]['name1']; ?></p>

    <p id="movie-explan">
      درباره فیلم <?php echo $movie[0]['name']; ?>
      <br>
      <?php echo $movie[0]['information']; ?>

    </p>

    <br><br><br>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    دسته بندی : <?php
                for ($i = 0; $i < count($genre); $i++) {
                  echo $genre[$i];
                  $count = count($genre);
                  $count--;
                  if ($i < $count)
                    echo ' - ';
                }
                // echo $movie[0]['name'];

                if (isset($_POST['message']) && isset($_SESSION['username'])) {
                  $user = get_user($_SESSION['username']);
                  echo $user['id'];
                  echo '<br>';
                  echo $movie[0]['id'];
                  echo '<br>';
                  echo $_POST['message'];
                  insert_message($user['id'], $movie[0]['id'], $_POST['message']);

                ?>
      <script>
        Swal.fire(
          'عملیات موفق',
          'نظر شما با موفقیت ارسال شد',
          'success'
        )
      </script>
    <?php
                } elseif (isset($_POST['message']) && !isset($_SESSION['username'])) {
    ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'عملیات نا موفق',
          text: 'نطر دهی فقط برای اعضاع امکان پذیر است',

        })
      </script>
    <?php
                }
    ?>
  </div>


  <br><br><br><br><br><br>


  <div class="container message-box bg-dark" id="message-box">

    <ul>
      <?php
      $messages = get_movie_message($movie[0]['id']);
      for ($i = 0; $i < count($messages); $i++) {
        $user = get_user_as_id($messages[$i][1]);
      ?>
        <div class="message-username"><?php print_r($user['name']) ?></div>
        <li class="messages-li"> <?php print_r($messages[$i][3]) ?> </li>
      <?php } ?>
    </ul>
  </div>


  <div class="container send-message-box  bg-dark" id="send-message-box">
    <div class="mb-3">
      <form method="POST">
        <br><br><br><br><br><br><br>
        <label for="validationTextarea" id="send-message-label">نظر خود رو بنویسید</label>
        <textarea class="form-control is-invalid" name="message" id="send-message-input" placeholder="نظر خود را بنویسید..."></textarea>
        <button class="btn btn-primary" id="send-message-btn"> نظرخود را وارد نمایید</button>
      </form>

    </div>

  </div>

<?php

}
