<?php
alli();
function get_title()
{
    return "بخش ممنوعه|اضافه کردن فیلم";
}
function get_content()
{
?>

    <?php
    if (isset($check) && $check = true)
        redirect_to(home_url('home'));

    ?>

    <style>
        body {
            background-color: whitesmoke;
        }

        #footer {
            display: none;
        }

        #form_cms {
            width: 1000px;
            position: relative;
            top: 50px;
            left: 10%;
        }

        #form_cms1 {
            width: 100%;
            position: relative;
            top: 50px;
            left: 10%;
        }

        #form_cms2 {
            width: 100%;
            position: relative;
            top: 50px;
            left: 10%;
        }

        .add_film {
            position: relative;
            margin-top: 70px;
        }

        #btn-addFilm {
            position: relative;
            top: 700px;
            width: 100%;

        }

        #h4-addFilm {
            float: right;
            position: relative;
            top: 50px;
            right: 50px;
        }

        #genre {
            position: relative;
            top: 80px;
            text-align: right;
            direction: rtl;
            width: 100%;
        }

        #genre input {
            margin-left: 17px;
        }

        #h3-genre {
            position: absolute;
            right: 0px;
        }

        #h3-link {
            position: absolute;
            z-index: 100000;
            width: 10%;

            left: 101%;
        }

        .form-control {
            direction: rtl;
        }

        #link {
            position: relative;
            transform: translate(0px, 300px);
            width: 90%;
            height: 400px;
        }

        #link_div {
            position: absolute;
            height: 1%;
            width: 100%;
            top: 0px;
        }

        #add_btn {
            position: relative;
            left: 87%;
            top: 250px;
        }

        #remove_btn {
            position: relative;
            left: 87%;
            top: 250px;
        }

        .hr {
            position: absolute;
            width: 100%;
            left: 10%;
            margin-top: 8%;
        }
    </style>
    <script>
        function set_input_name() //این میاد اسم های اینپوت های باکس هارو درست میکنه
        {
            let link_name = document.getElementsByClassName('link_name')
            let link_address = document.getElementsByClassName('link_address')
            for (let i = 0; i < link_name.length; i++) {

                link_name[i].name = 'link_name' + i + ''
                console.log(link_name[i]);
            }

            for (let i = 0; i < link_address.length; i++) {

                link_address[i].name = 'link_address' + i + ''
                console.log(link_address[i]);
            }
        }


        window.addEventListener('load', e => {

            let elem = document.getElementById('link_div')
            let link = document.getElementById('link')


            document.getElementById('add_btn').addEventListener('click', e => {
                e.preventDefault()

                let elems = document.getElementsByClassName('link_div').length //این تعداد لینک باکس هامون قبل اضافه شدنه مال این کلیکه

                var clone = elem.cloneNode(true);
                clone.style.top = "" + elems * 240 + "px"
                link.appendChild(clone) //لینک باکس جدید اضاف شد

                elems = document.getElementsByClassName('link_div') //این تعداد لینک باکس هامون بعد اضافه شدنه مال این کلیکه


                let num_of_height = elems.length * 300 //این دوتا مال ارتفاع باکس اصلیمونه که باکس ها توش اضاف میشن
                link.style.height = "" + num_of_height + "px"



                set_input_name() //این میاد اسم های اینپوت های باکس هارو درست میکنه




            })


            document.getElementById('remove_btn').addEventListener('click', e => { //اینم برای دکمه حذف باکس است
                e.preventDefault();
                link.removeChild(link.lastChild)
                let elems = document.getElementsByClassName('link_div').length
                elems = elems == 0 ? elems = 1 : elems
                let num_of_height = elems == 1 ? elems * 400 : elems * 300
                link.style.height = "" + num_of_height + "px"
            })


            set_input_name() //این میاد اسم های اینپوت های باکس هارو درست میکنه

        })
    </script>
    <?php $films = update(); ?>
    <h4 id="h4-addFilm">اضافه کردن فیلم</h4>
    <form method="POST" class="container" ">

        <div class=" input-group mb-3 add_film" id="form_cms">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">name</span>
        </div>
        <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["name"])) echo $_POST['name'];
                                                                                            elseif (isset($films['name'])) echo $films['name'] ?>" name="name" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">english name</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["name1"])) echo $_POST['name1'];
                                                                                                elseif (isset($films['name1'])) echo $films['name1'] ?>" name="name1" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">year</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" name="year" value="<?php if (isset($_POST["year"])) echo $_POST['year'];
                                                                                                            elseif (isset($films['year'])) echo $films['year'] ?> " aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">IMDB</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" name="IMDB" value="<?php if (isset($_POST["IMDB"])) echo $_POST['IMDB'];
                                                                                                            elseif (isset($films['IMDB'])) echo $films['IMDB'] ?> " aria-describedby="inputGroup-sizing-default">
        </div>


        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">likes</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["likes"])) echo $_POST['likes'];
                                                                                                elseif (isset($films['likes'])) echo $films['likes'] ?> " name="likes" aria-describedby="inputGroup-sizing-default">
        </div>


        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">stars</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["stars"])) echo $_POST['stars'];
                                                                                                elseif (isset($films['stars'])) echo $films['stars'] ?> " name="stars" aria-describedby="inputGroup-sizing-default">
        </div>


        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">director</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["director"])) echo $_POST['director'];
                                                                                                elseif (isset($films['director'])) echo $films['director'] ?> " name="director" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">explan</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["explan"])) echo $_POST['explan'];
                                                                                                elseif (isset($films['explan'])) echo $films['explan'] ?> " name="explan" aria-describedby="inputGroup-sizing-default">
        </div>


        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">information</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["information"])) echo $_POST['information'];
                                                                                                elseif (isset($films['information'])) echo $films['information'] ?>" name="information" aria-describedby="inputGroup-sizing-default">
        </div>



        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">country</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["country"])) echo $_POST['country'];
                                                                                                elseif (isset($films['country'])) echo $films['country'] ?> " name="country" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 add_film" id="form_cms">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">subtitle</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php if (isset($_POST["subtitle"])) echo $_POST['subtitle'];
                                                                                                elseif (isset($films['subtitle'])) echo $films['subtitle'] ?> " name="subtitle" aria-describedby="inputGroup-sizing-default">

        </div>



        <div class="input-group mb-3 add_film" id="form_cms" style="direction: rtl;">
            <div style="direction: rtl;text-align:right;">
                <input type="radio" onchange="alli(event)" name="movie" id="radio1" checked>
                <label for="radio1">فیلم </label>
                <br>
                <input type="radio" onchange="alli(event)" name="movie" id="radio2">
                <label for="radio2">سریال</label>
            </div>

        </div>

        <div class="input-group mb-3 add_film season" id="form_cms" style="display: none;">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">تعداد فصل</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" name="season" aria-describedby="inputGroup-sizing-default">

        </div>


        <div class="input-group mb-3 add_film" id="form_cms">
            <h3 id="h3-genre">ژانر ها </h3>

            <div id="genre">

                <label for="check">اکشن</label>
                <input type="checkbox" name="action" id="">
                <label for="check">ترسناک</label>
                <input type="checkbox" name="tarsnak" id="">
                <label for="check">درام</label>
                <input type="checkbox" name="dram" id="">
                <label for="check">کمدی</label>
                <input type="checkbox" name="fun" id="">
                <label for="check">عاشقانه</label>
                <input type="checkbox" name="love" id="">
                <label for="check">جنایی</label>
                <input type="checkbox" name="jenaie" id="">
                <label for="check">ماجراجویی</label>
                <input type="checkbox" name="majarajoie" id="">
                <label for="check">علمی تخیلی</label>
                <input type="checkbox" name="elmi" id="">
                <label for="check">مستند</label>
                <input type="checkbox" name="mostanad" id="">
                <label for="check">خانوادگی</label>
                <input type="checkbox" name="family" id="">
                <label for="check">انیمی</label>
                <input type="checkbox" name="anime" id="">
                <label for="check">انیمیشن</label>
                <input type="checkbox" name="animation" id="">
                <label for="check">برترین</label>
                <input type="checkbox" name="best" id="">

            </div>






        </div>


        <div id="link">
            <h3 id="h3-link">لینک ها </h3>

            <div id="link_div" class="link_div">



                <div class="input-group mb-3 add_film" id="form_cms1">


                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">link name</span>
                    </div>
                    <input type="text" class="form-control link_name" aria-label="Sizing example input" value="" name="information" aria-describedby="inputGroup-sizing-default">
                </div>


                <div class="input-group mb-3 add_film" id="form_cms2">

                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">link address</span>
                    </div>
                    <input type="text" class="form-control link_address" aria-label="Sizing example input" value="" name="information" aria-describedby="inputGroup-sizing-default">
                </div>

                <hr class="hr">
            </div>





        </div>
        <button class="btn btn-danger" id="remove_btn">remove</button>
        <button class="btn btn-primary" id="add_btn">add</button>








        <button class="btn btn-primary" id="btn-addFilm" name="btn">
            send
        </button>


    </form>



    <?php




}

function alli()
{

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    if (isset($_POST['name']) && isset($_POST['name1']) && isset($_POST['year']) && isset($_POST['explan']) && isset($_POST['information'])) {
        if (!empty($_POST['name']) && !empty($_POST['name1']) && !empty($_POST['year']) && !empty($_POST['explan']) && !empty($_POST['information']) && isset($_POST['season'])) {
            $name = $_POST['name'];
            $name1 = $_POST['name1'];
            $year = $_POST['year'];
            $IMDB = (isset($_POST['IMDB'])) ? $_POST['IMDB'] : "";
            $likes = (isset($_POST['likes'])) ? $_POST['likes'] : "";
            $stars = (isset($_POST['stars'])) ? $_POST['stars'] : "";
            $director = (isset($_POST['director'])) ? $_POST['director'] : "";
            $country = (isset($_POST['country'])) ? $_POST['country'] : "";
            $subtitle = (isset($_POST['subtitle'])) ? $_POST['subtitle'] : "";
            $explan = $_POST['explan'];
            $information = $_POST['information'];
            $movie_or_serial = '';

            $movie_or_serial = isset($_POST['serial']) ? 'serial' : 'movie';
            $season = $_POST['season'];

            if (isset($_GET['name'])) {
                // update_movie($name, $name1, $year, $IMDB, $likes, $stars, $director, $explan, $information, $country, $subtitle, $movie_or_serial, $season, $_GET['name']);
                $get = $_GET['name'];
                $move_id = get_id_as_name("$get");
            }


            if (!isset($_GET['name'])) {
                //add_movie($name, $name1, $year, $IMDB, $likes, $stars, $director, $explan, $information, $country, $subtitle, $movie_or_serial, $season);
                $move_id = get_id_as_name("$name");
            }

            $move_id = get_id_as_name("$name");
            $move_id = intval($move_id['id']);
            $action = (isset($_POST['action'])) ? 1 : 0;
            $tarsnak = (isset($_POST['tarsnak'])) ? 1 : 0;
            $dram = (isset($_POST['dram'])) ? 1 : 0;
            $fun = (isset($_POST['fun'])) ? 1 : 0;
            $love = (isset($_POST['love'])) ? 1 : 0;
            $jenaie = (isset($_POST['jenaie'])) ? 1 : 0;
            $majarajoie = (isset($_POST['majarajoie'])) ? 1 : 0;
            $elmi = (isset($_POST['elmi'])) ? 1 : 0;
            $mostanad = (isset($_POST['mostanad'])) ? 1 : 0;
            $family = (isset($_POST['family'])) ? 1 : 0;
            $anime = (isset($_POST['anime'])) ? 1 : 0;
            $animation = (isset($_POST['animation'])) ? 1 : 0;
            $best = (isset($_POST['best'])) ? 1 : 0;


            if (isset($_GET['name']))
                // update_genre($move_id, $action, $tarsnak, $dram, $fun, $love, $jenaie, $majarajoie, $elmi, $mostanad, $family, $anime, $animation, $best);

                if (!isset($_GET['name']))
                    // add_genre($move_id, $action, $tarsnak, $dram, $fun, $love, $jenaie, $majarajoie, $elmi, $mostanad, $family, $anime, $animation, $best);




































                    redirect_to(home_url('/home'));
        } else {
    ?>
            <script>
                alert("لطفا فیلد ها رو پر کنید")
            </script>
<?php
        }
    }
}


function update()
{
    if (isset($_GET['name'])) {
        $update = get_all_movie_as_name($_GET['name']);
        $update = $update[0];
        return $update;
    }
}
