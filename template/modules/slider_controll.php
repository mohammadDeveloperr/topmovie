<?php
function check_add_delete()
{
    if (isset($_GET['job']) && $_GET['job'] == "delete") {
        delete_slider_list($_GET['name']);
        redirect_to(home_url("/slider_controll"));
    }
    if (isset($_POST['name']) && $_POST['name'] != null) {
        add_in_slider($_POST['name']);
        redirect_to(home_url("/slider_controll"));
    }
}

function check_add_delete_serial()
{
    if (isset($_GET['job']) && $_GET['job'] == "delete_serial") {
        delete_slider_list($_GET['name']);
        redirect_to(home_url("/slider_controll?type=serial"));
    }
    if (isset($_POST['serial_name']) && $_POST['serial_name'] != null) {
        add_in_serial_slider($_POST['serial_name']);
        redirect_to(home_url("/slider_controll?type=serial"));
    }
}

check_add_delete();
check_add_delete_serial();
function get_title()
{
    return "بخض ممنوعه|کنترل اسلایدر اصلی";
}
function get_content()
{

?>

    <style>
        body {
            background-color: whitesmoke;
        }

        #footer {
            top: 50%;
        }

        #controll-slider {
            position: relative;
            top: 100px;
        }

        #slider_controll_table {
            direction: rtl;
        }

        #add_in_controll_slider {
            float: right;
            width: 5%;
            margin-right: 12.5%;
        }

        #add_in_controll_slider1 {
            float: right;
            width: 7%;

        }
    </style>

    <?php
   


    ?>

        <?php if (isset($_GET['job']) && $_GET['job'] == "add") { ?>
            <form class="container" id="controll-slider" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">film English name </span>
                    </div>
                    <input type="text" class="form-control" style="direction:rtl;" aria-label="Sizing example input" name="name" aria-describedby="inputGroup-sizing-default">
                </div>
                <button class="btn btn-sm btn-primary container " id="add_in_controll_slider1" href="">اضافه کردن</button>
            </form>
        <?php } else { 
            if (isset($_GET['type']) && $_GET['type'] == 'home') {
        $slider_list = select_slider_list();
        ?>
            <table class="table table-bordered table-hover container" id="slider_controll_table">
                <tr class="info">


                    <th>نام انگلیسی فیلم</th>
                    <th>عملیات</th>
                </tr>
                <?php for ($i = 0; $i < count($slider_list); $i++) { ?>
                    <tr>
                        <td><?php echo $slider_list[$i][0]; ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="<?php home_url("slider_controll") ?>?job=delete&&name=<?php echo $slider_list[$i][0] ?>">حذف</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <a class="btn btn-sm btn-primary container " id="add_in_controll_slider" href="<?php home_url("slider_controll") ?>?job=add">اضافه کردن</a>
            <br><br><br><br>
        <?php
        }
    }


    





    if (isset($_GET['type']) && $_GET['type'] == 'serial') {
        $serial_slider_list = select_series_slider_list();
        ?>

        <table class="table table-bordered table-hover container" id="slider_controll_table">
            <tr class="info">


                <th>نام انگلیسی فیلم</th>
                <th>عملیات</th>
            </tr>
            <?php for ($i = 0; $i < count($serial_slider_list); $i++) { ?>
                <tr>
                    <td><?php echo $serial_slider_list[$i][0]; ?></td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="<?php home_url("slider_controll") ?>?job=delete_serial&&name=<?php echo $serial_slider_list[$i][0] ?>">حذف</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <a class="btn btn-sm btn-primary container " id="add_in_controll_slider" href="<?php home_url("slider_controll") ?>?job=add_serial">اضافه کردن</a>
        <br><br><br><br>

<?php
    }


    if (isset($_GET['job']) && $_GET['job'] == "add_serial") { ?>
        <form class="container" id="controll-slider" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">film English name </span>
                </div>
                <input type="text" class="form-control" style="direction:rtl;" aria-label="Sizing example input" name="serial_name" aria-describedby="inputGroup-sizing-default">
            </div>
            <button class="btn btn-sm btn-primary container " id="add_in_controll_slider1" href="">اضافه کردن</button>
        </form>
    <?php }


}
