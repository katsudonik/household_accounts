$(function(){
    $('#menu li').hover(function(){
        $("ul:not(:animated)", this).slideDown(100);
    }, function(){
        $("ul.child",this).slideUp(100);
    });
});