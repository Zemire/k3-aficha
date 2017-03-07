;
(function ($) {
    
    //Gform Inputs
	gFormInputs = function() {

		$('.gfield_error').addClass('selected');
		var fields = $('.gfield input, .gfield textarea');

		fields.each(function(){
			if ($(this).val() !== '') {
				var parent = $(this).closest('.gfield');
				parent.addClass('selected');
			}
		});

		fields.bind('focus', function(){
			var parent = $(this).closest('.gfield');
			parent.addClass('selected');
		});

		fields.on("change", function(){
			var parent = $(this).closest('.gfield');
			parent.addClass('selected');
		});

		fields.bind('focusout', function(){
			var current = $(this);
			var parent = current.closest('.gfield');
			if (current.val() === "" && parent.hasClass('selected') ) {
				if (!parent.hasClass('gfield_error')) {
					parent.removeClass('selected');
				}
			}
		});

	}
    
    // Scripts which runs after DOM loaded
    $(document).ready(function() {
        
        /* prevent scrolling on # */
        jQuery('a[href="#"]').click(function(event){
                  event.preventDefault();
        });
        
        //Make elements equal height
		$('.matchHeight').matchHeight();
        $('.matchHeight_img').matchHeight();
        $('.matchHeight_title').matchHeight();
        $('.matchHeight_content').matchHeight();
        $('.matchHeight_column').matchHeight();
        
        // Add fancybox to images
		$('.gallery-item a').attr('rel','gallery');
		if ( $.browser.safari) {
		//in case it is safari - locked: true (block background layer)
			var locked=true;
		}else{
		//in case it is not safari - locked: false (unlock to scroll bacground layer)
			var locked=false;
		}
		$('a[rel*="album"], .gallery-item a, .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
			minHeight: 0,
			autoCenter:true,
			scrolling : 'no',
			padding : 0,
			margin: [30,30,30,30],
			helpers: {
				overlay: {
					locked: locked
				}
			}
			});
        
        //Remove placeholder on click
		$("input,textarea").each(function () {
			$(this).data('holder', $(this).attr('placeholder'));

			$(this).focusin(function () {
				$(this).attr('placeholder', '');
			});

			$(this).focusout(function () {
				$(this).attr('placeholder', $(this).data('holder'));
			});
		});
        
        /* ------------- slider ---------------*/
          jQuery('.slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
        //  asNavFor: '.slider-nav',
          autoplay: true,
          speed: 500,
          dots: false,
              responsive: [
                  {
                    breakpoint: 1024,
                      settings: {
                          //dots: false,
                      }
                  },
                  {
                    breakpoint: 767,
                      settings: {
                        infinite: true,
                        //arrows: false,
                      }
                  }
            ]
        });
        
        /* --------------------- Smooth scrollings ----------------------- */
        
        var $smoothRoot = $('html, body');
        
        //when clicking an anchor link
        
        $('a[href^="#"]:not([href="#"])').click(function(){
           var el = $(this).attr('href');
           var header_height = $('.header').height();
           $smoothRoot.animate({
            scrollTop: $(el).offset().top - header_height
           }, 750);
            
           return false;

          });
        
        // Scroll to Top 
        
        $("a[href='#top']").click(function() {
          $smoothRoot.animate({ scrollTop: 0 }, 750);
          return false;
        });
        
    }); // END document ready
    
    // Scripts which runs after all elements load
	$(window).load(function () {
		function initVideo() {
			$videoHolder = $('#videoHolder');
			if ($videoHolder.length > 0) {
				$videoHolder = $('.videoHolder-cont');
				jwplayer("videoHolder").setup({
					flashplayer: $videoHolder.data('template-dir') + "/js/plugins/jwplayer/jwplayer.flash.swf",
					file: $videoHolder.data('video-url'),
					skin: $videoHolder.data('template-dir') + "/js/plugins/jwplayer/six/six.xml",
					image: $videoHolder.data('video-cover'),
					width: "100%",
					height: "100%",
					autostart: false
				});
			}
		};
		initVideo();
		//jQuery code goes here
        
	});// END elements load

	// Scripts which runs at window resize
	$(window).resize(function () {


	});// END window resize         
});