<html lang="en">

<head>

</head>

<body>




    <div class="fixed-top" id="responsive-nav">

        <div class="collapse" id="navbarToggleExternalContent">

            <div class="bg-dark p-4" style="direction: rtl;text-align:right;">
                <h4 style="color: blue;">تاپ مووی</h4>
                <br>
                <div><svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" fill="currentColor" color="white" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                    </svg>
                    <a style="color: white;font-size:15px;margin:50px 6px;">خانه</a>
                </div>

                <br>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" color="white" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                    </svg>
                    <a style="color: white;font-size:15px;margin:50px 6px;">لیست من</a>
                </div>
                <br>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star-fill" color="white" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <a style="color: white;font-size:15px;margin:50px 6px;">برترین ها</a>
                </div>

            </div>

        </div>
        <nav class="navbar navbar-dark" id="responsive-nav1" style="direction:rtl;">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="responsive-search">
            <a href="search">
                <b><svg xmlns="http://www.w3.org/2000/svg" width="30" color="white" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></b></a>
            </div>






            <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item active" style="position:relative;left:20px;top:0px;list-style-type:none;" onclick="show_nav()">
                        <a  class=" nav-link " tabindex=" -1" aria-disabled="true"><b><svg xmlns="http://www.w3.org/2000/svg" color="white"width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg></b></a>
                    </li>


                <?php
                }
                if (!isset($_SESSION['username'])) { ?>
                
                    <li class="nav-item active"  id="login"><a id="user-a" href="login">ورود / ثبت نام </a> </li>
                <?php }?>








        </nav>
    </div>












    <nav class="navbar navbar-expand-lg navbar bg" style="direction: rtl;" id="nav">

        <button class="navbar-toggler" type="button" data-toggle="collapse" style="color: white;" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav" id="navbarUL">
                <li class="nav-item active">
                    <a class="nav-link" href="home"> خانه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="bookmarks"> لیست من </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="best" tabindex="-1" aria-disabled="true">برترین ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="serial" tabindex="-1" aria-disabled="true">سریال ها</a>
                </li>

                <li class="nav-item active" id="search-icon" style="right: 850px;">
                    <a class="nav-link " href="search" tabindex="-1" aria-disabled="true"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></b></a>
                </li>



                <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item active" style="right: 200%;cursor:pointer;" onclick="show_nav()">
                        <a class=" nav-link " tabindex=" -1" aria-disabled="true"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg></b></a>
                    </li>


                <?php
                }
                if (!isset($_SESSION['username'])) { ?>
                    <li class="nav-item active" style="right: 180%;" id="login"><a id="user-a" href="<?php echo SITE_URL . '/login' ?>">ورود / ثبت نام </a> </li>
                <?php }
                global $current_user; ?>
            </ul>

        </div>
    </nav>
    <div id="user">
        <?php $users = get_user($_SESSION['username']); ?>
        <p><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg><span class="text-box"><?php echo $users['name']; ?> </span>
            <hr>
        </p>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg>
            <span class="text-box"><a href="bookmarks">لیست من</a></span>
        </p>

        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <span class="text-box"><a href="account">حساب کاربری</a></span>
        </p>

        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
            <span class="text-box"><a href="logout">خروج</a></span>
        </p>
    </div>
</body>

</html>