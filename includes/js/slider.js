
function slider(next1, prev1, li) {
    
    $(document).ready(function () {
        
        var li1 = document.getElementsByClassName(li)
        var next2 = document.getElementById(next1)
        var prev2 = document.getElementById(prev1)
        var d1 = li1
        var number = 0
        var sum = d1.length;
        
            if(innerWidth < 900)
            {
                $("#slider").css
                ({
                    "width":"100%",
                     "height":"60%",
                     "background-size":"120%"
                     ,
                     "top":"50px"
                     
            });
                 $(".explan-slider").css({
                   "display":"none"

                 })
                 $("#next").css({
                  "display":"none"
                 })
                 $("#prev").css({
                    "display":"none"
                   })

                   document.getElementById("slider").addEventListener('touchstart', function (event) {
                    var x = moveTouch(event)
                    start = x;
                  })
            

                   document.getElementById("slider").addEventListener('touchend', function (event) {

                    var x = moveTouch(event)
            
                    end = x;
            
                    if (end > start) {
                      next();
                    }
                    else if (start > end) {
                      prev();
                    }
            
            
                  })
                 
            }


             
        d1[number].style.display = 'block';

        function next() {
            number++;
            if (number > sum - 1) 
            {
                number = 0
            }
            IN_slider(number)

        }


        function prev() {
            number--;
            if (number < 0) {
                number = sum - 1

            }

            IN_slider1(number)

        }
       
        next2.addEventListener('click', function () { next() });
        prev2.addEventListener('click', function () { prev() });
        function IN_slider(number) {
            if (number == 0) {
                $(d1[sum - 1]).fadeOut();
            }
            else {
                $(d1[number - 1]).fadeOut(1000);
            }

            $(d1[number]).fadeIn(1000);

        }

        function IN_slider1(number) {
            if (number == sum - 1) {
                d1[0].style.display = 'block';
            }
            else {
                $(d1[number + 1]).fadeOut(1000);
            }

            //d1[number].style.display = 'block';
            $(d1[number]).fadeIn(1000);

        }
        
    });
    setInterval(function(){
        document.getElementById("next").click();
    }, 7000);
}