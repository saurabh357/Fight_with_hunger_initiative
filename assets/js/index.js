(function ($) {
    "use-strict"

    jQuery(document).ready(function () {
        // for menu drawer
        $(document).on('click', '#menuDrawer', function () {
            if ($('#drawerMenu').length > 0) {
                $('#drawerMenu').toggleClass('open-drawer');
            }
        }); 

        $(document).on('click', '#drawerMenu', function (e) {
            if (e.target == this) {
                $('#drawerMenu').removeClass('open-drawer');
            }
        }); 

        $(document).on('click', '.close-drawer', function () {
            $('#drawerMenu').removeClass('open-drawer');
        }); 

        // for menu drawer
        $(document).on('click', '#searchDrawer', function () {
            if ($('#searchBox').length > 0) {
                $('#searchBox').addClass('open-search-box');
            }
        }); 

        $(document).on('click', '#searchBox', function (e) {
            if (e.target == this) {
                $('#searchBox').removeClass('open-search-box');
            }
        }); 

        $(document).on('click', '.close-search-box', function () {
            $('#searchBox').removeClass('open-search-box');
        });

        // for signin drawer
        $(document).on('click', '#signIn', function(e) {
            e.preventDefault();
            if ($('#signInForm').length > 0) {
                $('#signInForm').addClass('open-signin');
            }
        });

        $(document).on('click', '#signUp', function(e) {
            e.preventDefault();
            if ($('#signInForm').length > 0) {
                $('#signInForm').addClass('open-signup');
            }
        });

        $(document).on('click', '#signInForm', function (e) {
            if (e.target == this) {
                $('#signInForm').removeClass('open-signin');
            }
        });

        // for signup drawer
        $(document).on('click', '#signUp', function(e) {
            e.preventDefault();
            if ($('#signInForm').length > 0) {
                $('#signInForm').addClass('open-signup');
            }
            $('.form-signin')[0].reset();
        });

        $(document).on('click', '#signInFromsignUp', function(e) {
            e.preventDefault();
            if ($('#signInForm').length > 0) {
                $('#signInForm').removeClass('open-signup');
            }
            $('.form-signup')[0].reset();
        });

        $(document).on('click', '.close-signin', function () {
            $('#signInForm').removeClass('open-signin open-signup');
        });
        

        // owl-carousel
        $('#latestNewsCarousel').owlCarousel({
            loop:true,
            margin:5,
            nav:true,
            autoHeight: true,
            items: 1,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>']
        });

        $('#trendNews').owlCarousel({
            loop:true,
            margin:5,
            nav:true,
            autoHeight: true,
            items: 1,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>']
        });

        $('#commentsCarousel').owlCarousel({
            loop:true,
            margin:5,
            nav:true,
            items: 1,
            autoHeight: true,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>']
        });
    });

}(jQuery));