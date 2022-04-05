/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const $ = require('jquery');
global.$ = global.jQuery = $;

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

  // import Swiper bundle with all modules installed
  import Swiper from 'swiper/bundle';

  // import styles bundle
  import 'swiper/css/bundle';

 
  $(document).ready(function(){
    console.log('Jquery est installé ')
  });


  $(document).ready(function(){
    var swiper = new Swiper('.swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
          },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
        },
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
  });
  
 
 $(document).on('change','#reservation_hotel',function() {
    let $hotel = $('#reservation_hotel')
    let $startField= $('#reservation_startDate')
    let $endField= $('#reservation_endDate')
    
    let $form = $(this).closest('form');
    
    let data = {};
    data[$hotel.attr('name')] = $hotel.val();
    data[$startField.attr('name')] = $startField.val()
    data[$endField.attr('name')] = $endField.val()
    
    $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        complete: function(html) {
       
        $('#reservation_suite').replaceWith($(html.responseText).find('#reservation_suite'))
        $('#reservation_startDate').replaceWith($(html.responseText).find('#reservation_startDate'))
        $('#reservation_endDate').replaceWith($(html.responseText).find('#reservation_endDate'))
       
        }
    });
});
 

        
    $(document).ready(function(){
        $('.check_ok').hide();
        $('.check_false').hide();

        $(document).on('change', '#reservation_suite',function(){
            let $suite = $('#reservation_suite').val()
            let $startDate= $('#reservation_startDate').val()
            let $endDate= $('#reservation_endDate').val()

            let data={};
            data['suite']= $suite;
            data['startDate']=$startDate;
            data['endDate']=$endDate;

            console.log(data);

            $.ajax({
                type: 'POST',
                url: '/reservation/verif',
                data: data,
                error: function(){
                    console.log('error')
                },
                success: function(data){
                    console.log(data)
                    if(data.status== 'error'){
                        $('.check_ok').hide();
                        $('.btn').hide();
                        $('.check_false').show();
                        $('.check_false').text('La suite n\'est pas disponible');

                        
                    }else{
                        $('.check_ok').show();
                        $('.btn').show();
                        $('.check_ok').text('La suite est disponible ');
                        $('.check_false').hide();
                    }
                }
            }); 
        });
    
    });


    $(document).ready(function(){ 
        $('#reservation_hotel').attr('disabled', 'disabled');

        $(document).on('change','#reservation_endDate',function() {
            $('#reservation_hotel').removeAttr('disabled');
        });
    });


    

    
    
