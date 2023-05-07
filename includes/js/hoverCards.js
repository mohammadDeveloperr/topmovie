$(document).ready(function () {
    $('.cards').hover(function (e) 
    {
        var target = e.target;
        //var elem = document.getElementsByClassName(target);
        //console.log(target);
        var elems = target.getElementsByTagName("p")
        console.log(elems);
        
        var elems1 = target.getElementsByClassName('hover')
        
        //console.log(elems1);
        $(elems).fadeIn(500);
        $(elems1).fadeIn(500);
        
    },
     function (e)
     {
         var ul=document.getElementById('ul')
        var target1 = e.target.id
        var elems1 = e.target.parentElement.getElementsByTagName("p")
        var elems2 = e.target
        console.log(elems2);
       // console.log(elems2.parentElement.id);
        if(elems2.parentElement.id !=="ul" && elems2.id=='hover')
        {
        $(elems1).fadeOut(500);
        $(elems2).fadeOut(500);    
        }
        
    }
    );
});