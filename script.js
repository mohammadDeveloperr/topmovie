function search1() {
    //alert('hello world')
    //    document.getElementById('button').click()
    //    document.getElementById('search_box').focus()
}
window.onscroll = function () { myFunction() };

function myFunction() {

    var nav = document.getElementById("nav")

    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        nav.style.position = "fixed";
        nav.style.top = 0 + "px";
        nav.style.backgroundColor = "black";
    } else {
        nav.style.position = "relative";
        $(nav).css("background-color", " rgb(0, 0, 0,0)");
    }
}
// background-image: linear-gradient(black, rgb(255, 255, 255,0));



function show_nav() {
    // var user=document.getElementById('user')
    var user = ($('#user').css("display"))
    if (user == 'none') {
        $("#user").fadeIn();
    } else {
        $("#user").fadeOut();
    }

}
if (innerWidth < 900) {
    // document.getElementById("hover").style.display="none"
    document.getElementsByClassName("div-hover").style.display = "none"
}

function alli(e) {
    console.log(e.target.id);
    var target = e.target.id;
    if (target == 'radio2') {
        document.getElementsByClassName("season")[0].style.display = "flex"
        document.getElementById('radio2').setAttribute('name', 'serial');
        document.getElementById('radio1').setAttribute('name', 'serial');

    }
    else {
        document.getElementsByClassName("season")[0].style.display = "none"
        document.getElementById('radio2').setAttribute('name', 'movie');
        document.getElementById('radio1').setAttribute('name', 'movie');

    }
}