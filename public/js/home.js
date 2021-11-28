//header
(function(){
    var doc = document.documentElement;
    var w = window;
    var curScroll = prevScroll = w.scroll || doc.scrollTop;
    var curDirection = prevDirection = 0;

    var header = document.getElementById('site-header');
    var checkScroll = function() {
        curScroll = w.scrollY || doc.scrollTop;
        if(curScroll > prevScroll) {
            curDirection = 2;
        }
        else{
            curDirection = 1;
        }

        if(curDirection != prevDirection){
            toggleHeader();
        }

        prevDirection = curDirection;
        prevScroll = curScroll;
    }; 

    var toggleHeader = function() {
        if(curDirection ==2){
            header.classList.add('hide');
        }else if(curDirection == 1){
            header.classList.remove('hide');
        }
    };

    window.addEventListener('scroll', checkScroll);

})();
//btn category
$(document).ready(function(){
    $("#btn-category").click(function(){
      $("#listview-category").slideToggle('2000');
    });
  });
//button user
$(document).ready(function(){
    $("#btn-user02").click(function(){
      $("#listview-user").slideToggle('2000');
    });
  });

// btns star
$(document).ready(function(){
    $("#icon_star").click(function(){
        $("#icon_star").classList('iconify_star');
    });
  });
