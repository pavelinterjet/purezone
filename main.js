jQuery(document).ready(function($){

    var valid = true;
    // VALIDATION
    function validity( el ) {
        var name_val = el[0].value;
        var email_val = el[1].value;
        var phone_val = el[2].value;
        if(  $('input[name="'+el[0].name+'"]').val().length === 0 ){ 
            $('input[name="'+el[0].name+'"]').next().text('שדה ריק');
            valid = false;
        } else {
            $('input[name="'+el[0].name+'"]').next().text(' ');
            valid = true;
        }
        if(  $('input[name="'+el[1].name+'"]').val().length === 0 ){ 
            $('input[name="'+el[1].name+'"]').next().text('שדה ריק');
            valid = false;
        } else if( checkEmail(  $('input[name="'+el[1].name+'"]').val() ) == false ){
            $('input[name="'+el[1].name+'"]').next().text('כתובת מייל לא תקינה');
            valid = false;
        } else {
            $('input[name="'+el[1].name+'"]').next().text(' ');
            valid = true;
        }
        if(  $('input[name="'+el[2].name+'"]').val().length === 0 ){
            $('input[name="'+el[2].name+'"]').next().text('שדה ריק');
            valid = false;

        } else if( phonenumber( $('input[name="'+el[2].name+'"]').val() ) == false ) {
            $('input[name="'+el[2].name+'"]').next().text('מספר טלפון לא תקין');
            valid = false;

        }else {
            $('input[name="'+el[2].name+'"]').next().text(' ');
            valid = true;
        }
    }
    $('.popup_wrapper .close').click(function() {
        $(this).parents('.popup_wrapper').fadeOut();
    })
    // $('.section_four .links a').click(function(e) {
    //     e.preventDefault();
    //     var dataPop = $(this).attr('data-pop');
    //     $('.popup_wrapper').fadeIn();
    //     $.ajax({
    //         type: 'GET',
    //         dataType: 'HTML',
    //         url: 'diplomas/' + dataPop + '.php',
    //         success: function( data, res ) {
    //             $('.popup .content').html('');
    //             $('.popup .content').html(data);
    //             $('.slider').slick('unslick');
    //             setTimeout(()=>{
    //                 var slideNum;
    //                 if( $('.car_dip .dip_item ').length == 1 ) {
    //                     slideNum = 1;
    //                 } else {
    //                     slideNum = 3
    //                 }
    //                 $('.car_dip').slick({
    //                     rtl: true,
    //                     slidesToShow: slideNum,
    //                     slidesToScroll: 1,
    //                     arrows: false,
    //                     dots: true,
    //                     autoplay: false,
    //                     autoplaySpeed: 2000,
    //                     infinite: true,
    //                     centerMode: true,
    //                     responsive: [
    //                         {
    //                         breakpoint: 768,
    //                             settings: {
    //                                 slidesToShow: 1,
    //                             }
    //                         },
    //                     ]
    //                 });
    //             }, 1000 )
    //             $('.light_box').click(function() {
    //                 $('.light_box').fadeOut();
    //                 $('.popup_lightbox .content').html('');
    //             })
    //             $('.light_box .popup_lightbox').click(function (e) {
    //                 e.stopPropagation();
    //             })
    //             $('.car_dip').on('click', '.slick-slide',function(params) {
    //                 $('.popup_lightbox .content').html('');
    //                 var img = $(this).find('img').clone();
    //                 $('.popup_lightbox .content').html(img);
    //                 $('.light_box').fadeIn();
    //             })

    //         }
    //     });
    // })
    function checkEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    function phonenumber(inputtxt)
    {
        var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if( inputtxt.match(phoneno) ) {
            return true;
        } else {
            return false;
        }
    }




    // var lastScrollTop = 0;
    // $(window).scroll(function(event){
    //    var st = $(this).scrollTop();
    //     if( st > ( $('header').outerHeight() ) ) {
    //         $('header').addClass('fixed');
    //     } else {
    //         $('header').removeClass('fixed');
    //     }
    //    if (st > lastScrollTop && st > ( $('header').outerHeight() ) ){
    //        $('header').addClass('show_header');
    //    } else {
    //       $('header').removeClass('show_header');
    //    }
    //    lastScrollTop = st;
    // });




// var vid = $('video');
// var vid_pos = $('.video').offset();
// $(window).scroll(function(event){
//    var st = $(this).scrollTop();
//     topElement = vid_pos.top - 500;
//     bottomElement = vid_pos.top + $('.video').outerHeight();

//     if( st >=topElement && st<=bottomElement ) {
//         $(vid).trigger('play');
//     } else {
//         $(vid).trigger('pause');
//     }

// });



    $('body').click(function(e) {
        $('.mobile_m').slideUp();
    })

    $('.toggle_menu').click(function(e) {
        e.stopPropagation();
        if( $('.mobile_m').is(':visible') ) {
            $('.mobile_m').slideUp();
            $(this).removeClass('active');
        } else {
            $('.mobile_m').slideDown();
            $(this).addClass('active');
        }
    })

    $('.is_mobile .mobile_m a').click(function (e) {
        e.stopPropagation();
        $('.mobile_m').slideUp();
        $('.toggle_menu').removeClass('active');
    })

    $('.caru').slick({
        rtl: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
              breakpoint: 550,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
          ]
    });


    
    $("a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();
    
          // Store hash
          var hash = this.hash;
    
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
    
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    

    // $('form').submit(function(e){
    //     e.preventDefault();
       
    //     validity( $(this).serializeArray() );
    //     if( valid == false ) {
    //         return false;
    //     }
        
    //     var myform = document.getElementById("form");
    //     var fd = new FormData(myform );

    //     $.ajax({
    //         type: 'POST',
    //         processData: false,
    //         contentType: false,
    //         dataType: 'json',
    //         url: '',
    //         data: fd,
    //         beforeSend: function (params) {
                
    //         },
    //         success: function( data ) {

    //             var resp = JSON.parse( JSON.stringify(data) );
    //             if( typeof resp.error != 'undefined' ) {
    //                 var field_names = Object.keys(resp.error);
    //                 $('input').next().text(' ');
    //                 for (let index = 0; index < field_names.length; index++) {

    //                     if( typeof resp.error[field_names[index]] != 'undefined' ) {
    //                         $('input[name="'+field_names[index]+'"]').next().text(errors.error[field_names[index]]);
    //                     } 
    //                 }
    //             } else if( resp.success ) {
    //                 console.log('sent');

    //                 $('.thankyou').fadeIn();
    //                 $('.thankyou .flex_container').html(resp.success);
    //             } 



    //         }
    //     });
        
    // })




    

			$('#form').jetform({
				token:'e87e71bcf0952bc22200f5f1ff6760c503',
				errorSelector: '.errors',
				successSelector: '.form-success',
				hideSuccessAfter: 3,
				privacyMode: true,
				template:{
					custom_error: '{$field} בעל הודעה מותאמת'
				},
				onSuccess: function(args){
					console.log('onSuccess', args);
				},
				onError: function(errors){
					console.log('onError', errors);
				},
				onFail: function(error){
					console.log('onFail', error);
				},
				spinner: {
					active: true,
					width: '30px',
					height: '20px',
					color: '#333'
				}
			});
	


})