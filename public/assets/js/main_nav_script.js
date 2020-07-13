$(window).scroll(function(e) {
    var scroll = $(window).scrollTop();
    if (scroll >= 150) {
        $('.MainNav').addClass("NavBarFixed");//addClass
    } else {
        $('.MainNav').removeClass("NavBarFixed");
    }
});

function DropDownMobile()
{
    $('.NavLinkMainDropDown').hover(function() {
        $(this).trigger('click');
    }, function() { });

    $(".SingleMenu").click(function(){
        if($("#navbarNavDropdown").hasClass("show")) {
            $(".navbar-toggler").click();
        }
    });

    $(".navbar-toggler").click(function(){
        $(".NavCheckoutQuantityMobile").toggleClass("NavCheckoutQuantityMobileAfterToggleClick");
    });
}

function DesktopDropDown()
{
    $( ".DropDownDesktop" )
        .mouseover(function() {
            $(".dropdown-item").css("display", "block");
            $( this ).addClass('show').attr('aria-expanded',"true");
            $( this ).find('.MainDropDownMenu').addClass('show');
        })
        .mouseout(function() {
            $( this ).removeClass('show').attr('aria-expanded',"false");
            $( this ).find('.MainDropDownMenu').removeClass('show');
        });

    $(".dropdown-item").on( "click", function() {
        $(".dropdown-item").css("display", "none");
    });

}

function DesktopRightDropDown()
{
    $( ".RightDropDownDesktop" ).on( "mouseover", function() {
        $(".RightDropDownMenu").css("display", "block");
    });

    $( ".RightDropDownDesktop" ).on( "mouseout", function() {
        $(".RightDropDownMenu").css("display", "none");
    });

    $( ".RightDropDownMenu" ).on( "mouseover", function() {
        $(".RightDropDownMenu").css("display", "block");
    });

    $(".RightDropDownMenu").on( "mouseout", function() {
        $(".RightDropDownMenu").css("display", "none");
    });

}

(function($) {
    var $window = $(window),
        $html = $('html');

    $window.resize(function resize() {
        if ($window.width() < 798) {
            return DropDownMobile();
        }

        DesktopDropDown();
        DesktopRightDropDown();


    }).trigger('resize');
})(jQuery);