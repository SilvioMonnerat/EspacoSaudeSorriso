(function ($) {

     $.support.placeholder = ('placeholder' in document.createElement('input'));
     //fix for IE7 and IE8
     $(function () {
         if (!$.support.placeholder) {
             $("[placeholder]").focus(function () {
                 if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
             }).blur(function () {
                 if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
             }).blur();

             $("[placeholder]").parents("form").submit(function () {
                 $(this).find('[placeholder]').each(function() {
                     if ($(this).val() == $(this).attr("placeholder")) {
                         $(this).val("");
                     }
                 });
             });
        }
    });
    
    jQuery(function (){
        jQuery(".mnav").selectbox();
    });

    $(function() {
        $(".scrollable").scrollable({
            circular: true,            
            onSeek: function() {
                // console.info(this.getIndex());
            }
            
        }).autoscroll({autoplay: true, interval: 15000});    
        
        window.api = $(".scrollable").data("scrollable");
    });

    $(function(){
        $("#carrossel").jCarouselLite({
           /* auto    : 10000,
            speed   : 2000,*/
            visible : 2
        })
     })
    
	"use strict";
    //superfish menu
    $(function () {
        $('ul.sf-menu').superfish({
		delay: 1000,
		animation:  {
			opacity:'show',
			height:'show'
			},
		disableHI:  false
		});
    });
    //prettyphoto		
    $("a[rel^='prettyPhoto'], a[rel^='lightbox']").prettyPhoto({
        theme: 'pp_default',
        default_width: 500,
        overlay_gallery: true
    });
	//comment form box click function
	var $submit_button;
	var $website_box;
	$submit_button = $(".form-submit #submit");
	$website_box = $(".last-input input");
	$submit_button.click(function() {
            if( $website_box.attr("value") === "Website" ) {
 
                // Set it to an empty string
                $website_box.attr("value", "");
            }
	});
	// skills percentage
	$('.skill').each(function(){
		var dataperc;
		dataperc = $(this).attr('data-perc'),
		$(this).find('.skill-bar').animate({ "width" : dataperc + "%"}, dataperc*20);
	});
	//tooltip
    $(".tool-tip-content").hover(function () {
        $(this).next(".tooltip").stop(true, true).animate({
            opacity: "show",
            bottom: "25"
        }, "slow");
    }, function () {
        $(this).next(".tooltip").animate({
            opacity: "hide",
            bottom: "25"
        }, "fast");
    });
	//toggles
    $(".toggle-title").toggle(
    function () {
        $(this).addClass('toggle-active');
        $(this).siblings('.toggle-content').slideDown("fast");
    }, function () {
        $(this).removeClass('toggle-active');
        $(this).siblings('.toggle-content').slideUp("fast");
    });
	
	//tabs and accordions
    $(function () {
        //accordion
        $(".accordion").fptabs("div.pane", {
            tabs: '.tab',
            effect: 'slide'
        });
        //tabs
        $("ul.tabs").fptabs("div.panes > div", {
            effect: 'fade'
        });
    });
    //vertical tabs
    $(function () {
        $('#vertical-tabs, #vertical-tabs1, #vertical-tabs2, #vertical-tabs3, #vertical-tabs4, #vertical-tabs5, #vertical-tabs6, #vertical-tabs7, #vertical-tabs8, #vertical-tabs9, #vertical-tabs10').tabs({
            fx: [{
                opacity: 'toggle',
                duration: 90
            }, // hide option
            {
                opacity: 'toggle',
                duration: 90
            }]
        }); // show option
    });

    /*$(window).resize(function(){
        $(".fb-comments").attr("data-width", $("#FatPandaFacebookComments").width());
        FB.XFBML.parse($("#FatPandaFacebookComments")[0]);
    });*/
    //end
})(jQuery);

/* ------------------------------------------------------------------------ */
/* EOF
/* ------------------------------------------------------------------------ */

    var $comments = null;
    var $fbComments = null;
    var resizeTimeout = null;

    function resizeComments() {
        if (resizeTimeout) clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
        resizeTimeout = null;
            if (typeof FB === 'undefined') return;
            // The class of the wrapper element above is 'comments'
            $comments = $comments || jQuery('#FatPandaFacebookComments');
            $fbComments = $fbComments || jQuery(".fb-comments");
            if ($comments.width() !== parseInt($fbComments.attr("data-width"), 10)) {
                $fbComments.attr("data-width", $comments.width());
                FB.XFBML.parse($comments[0]);
            }
        }, 100);
    }

    jQuery(document).ready(function() {
      resizeComments();

      jQuery(window).resize(function() {
        resizeComments();
      });  
    });