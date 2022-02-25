$(".navOne").click(function() {
    $('.sideNav .logo').css('display', 'none');
    $('.sideNav').css('width', '70px');

    $('.iconsSideNav .teste').css('display', 'none');
    $('.icons').css('visibility', 'visible');

    $('.navOne').css('display', 'none');
    $('.navTwo').css('display', 'block');

    $('#main').css('margin-left', '50px');
    //$('.rightNav').css('margin-left', '160px');
    //$('.rightNav').css('margin-top', '20px');
});

$('.navTwo').click(function() {
    $('.sideNav .logo').css('display', 'block');
    $('.sideNav').css('width', '340px');

    $('.iconsSideNav .teste').css('display', 'inline');

    $('.navOne').css('display', 'block');
    $('.navTwo').css('display', 'none');

    $('#main').css('margin-left', '300px'); 
});