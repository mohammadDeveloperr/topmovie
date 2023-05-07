<?php
function get_title()
{
  return 'جستجو';
}
function get_content()
{
  
?>

  <style>
    body {
      color: white;
    }

    #footer {
      top: 1000px;
    }

    #button {
      position: relative;
      top: 40px;
      left: 10px;
      z-index: 10;
      border: 0px;
      background-color: white;
      cursor: pointer;
    }

    #search {
      background-color: white;
      padding: 1px 1px 1px 1px;
      border: 0px;
    }

    #search-span {
      padding: 0px 0px 0px 0px;
      border: 0px;
      margin-top: 10px;
      margin-left: 5px;
    }

    #search_parent {
      height: 50px;

      position: relative;
      top: 50px;
    }

    form {
      width: 100%;
    }

   

  </style>
  <script src="/script.js"></script>
  <div class="input-group mb-3 container" id="search_parent">
    <form method="GET">

      <button type="submit"  class="input-group-prepend" id="button">
        <span class="input-group-text" id="search-span">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" id="search" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
        </span>
      </button>
      <input onkeyup="search1()" type="text" id="search_box" name="search" class="form-control" placeholder=" : نام فیلم" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>" aria-label="Username" aria-describedby="basic-addon1" style="height: 50px;text-align:right;">

    </form>
  </div>



  <br><br><br><br>


  <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/hover.css' ?> ">
  <script src="<?php echo SITE_URL . '/includes/js/hoverCards.js'; ?>"></script>
  <?php
  if (isset($_GET['search'])) {

    $name = search($_GET['search']);
    $name_E = search1($_GET['search']);
    if ($name) {
      //echo '<pre>';
      //  print_r($name);
      $search = $name;
    }
    if ($name_E) {
      //print_r($name_E);
      $search = $name_E;
    }
  }

  if (isset($search)) {
  ?>



    <link rel="stylesheet" href="<?php echo SITE_URL . '/includes/css/hover.css' ?> ">
    <script src="<?php echo SITE_URL . '/includes/js/hoverCards.js'; ?>"></script>
    <br>

    <br>
    <div id="search-box">
      <?php
      //$movies = get_my_list($_SESSION['user_id']);
      for ($i = 0; $i < count($search); $i++) {
        $movie =get_all_as_name($search[$i][0]) ;
      ?>
     
      </pre>
        <div id="search-movie" class="cards" style="background-image: url('<?php echo SITE_URL . "/includes/" . $movie[0]['name1'] . " small.jpg"  ?>');">

          <p class="div-hover">

            <br><br><br>
            <span class="year"><?php echo $movie[0]['year']; ?>
            </span>

            <br><br>
            <span class="hover-like">
              <a href=""></a>
              <?php echo $movie[0]['likes']; ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="hover-likes" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
              </svg>
            </span>

            <br><br>
            <span class="imdb"><?php echo $movie[0]['IMDB']; ?><b style="margin-left: 3px;">IMDB</b></span>
          </p>
          <span class="box-name"><?php echo $movie[0]['name'] ?></span>
          <div class="hover" id="hover">
          </div>
          
          
       </div> 
 
    

      <?php } ?>
     </div> 






<?php
  }
}
