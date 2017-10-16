 require(["jquery","owlcarousel"],function($) {
            $(document).ready(function() {
                console.log('aaaa');
                $("#intro-slider").owlCarousel({
                    loop:true,
                    margin:0,
                    nav:false,
                    dots: true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });

                $("#brand-slider").owlCarousel({
                    loop:true,
                    margin:30,
                    nav:true,
                    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                    dots: false,
                    responsive:{
                        0:{
                            items:2
                        },
                        600:{
                            items:5
                        },
                        1000:{
                            items:5
                        }
                    }
                });

                $("#spc-crosssell").owlCarousel({
                    loop:true,
                    margin:30,
                    nav:true,
                    navText: ["<img src='../images/left-arrow.png'>","<img src='../images/right-arr.png'>"],
                    dots: false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:3
                        }
                    }
                });                

                // JS----
                $('.footer-bot h3').click(function() {
                    var self = $(this);
                    $('.footer-bot h3').each(function(e, el) {
                            $(el).parent().removeClass('open');
                            $(el).parent().removeClass('change');
                        });
                        self.parent().addClass('open',{duration:550});
                        self.parent().addClass('change',{duration:550});
                    
                });
                $('.bot-item-lc a').click(function() {
                    var self = $(this);
                    $('.bot-item-lc a').each(function(e,el) {
                            $(el).closest('.list-category .col-md-4').removeClass('show')
                    });
                        self.closest('.list-category .col-md-4').addClass('show',{duration:550});
                        return false;

                })
                

            });
        });