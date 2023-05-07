function card_slider(amount, id, a_id, a_id1) {

  $(document).ready(function () {

    $('#' + id).hover(function () {
      $('#' + a_id).fadeIn(200);
      $('#' + a_id1).fadeIn(200);
    }, function () {
      $('#' + a_id).fadeOut(200);
      $('#' + a_id1).fadeOut(200);
    }
    );

    var elements = document.getElementsByClassName('cards')

    if (window.innerWidth < 850) {
      var next = document.getElementsByClassName("control-next")
      var prev = document.getElementsByClassName("control-prev")
      for (var i = 0; i < elements.length; i++) {
        //alert("hello world")
        elements[i].style.width = 120 + 'px'
        elements[i].style.height = 168 + 'px'

      }



      document.getElementById(id).addEventListener('touchstart', function (event) {
        var x = moveTouch(event)
        start = x;
      })




      document.getElementById(id).addEventListener('touchend', function (event) {

        var x = moveTouch(event)

        end = x;

        if (end > start) {
          moveLeft();
        }
        else if (start > end) {
          moveRight();
        }


      })

    }
    else {
      //alert("hello world")
      for (var i = 0; i < elements.length; i++) {
        elements[i].style.width = 200 + 'px'
      }

    }
    var slideCount = $("#" + id + " ul li").length;

    var slideWidth = $("#" + id + " ul li").width();

    var slideHeight = $("#" + id + " ul li").height();

    var sliderUlWidth = slideCount * slideWidth;

    var ul = document.getElementById('ul')

    var slider = document.getElementById('' + id + '')

    var sum_width = amount * slideWidth




    var parent_element = document.getElementById(id)

    parent_element.style.height = slideHeight + 50


    $("#" + id + " ul").css({
      width: sliderUlWidth,

    });


    var number = slideWidth
    var number1 = 0
    function moveLeft() {

      if (sliderUlWidth > number * amount + .2) {

        number1 += slideWidth
        $("#" + id + " ul").animate({ left: +number * amount });
        number += slideWidth

      }




    }


    function moveRight() {
      if (number1 * amount - sum_width > -sum_width) {
        $("#" + id + " ul").animate({ left: number1 * amount - sum_width });
        number -= slideWidth
        number1 -= slideWidth
        var alli = $('#target').css("width")

      }
    }




    $("a #" + a_id + "").click(function (e) {
      moveRight();
    });

    $("a #" + a_id1 + "").click(function (e) {
      moveLeft();
    });
  });



}


function moveTouch(event) {
  // var x=event.touches[0];
  var x = event.changedTouches[0].clientX;
  return x;
}