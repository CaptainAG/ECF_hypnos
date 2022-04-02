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


var coucou = "coucou";

console.log(coucou)


 // When sport gets selected ...
 $(document).on('change','#reservation_hotel',function() {
    let $hotel = $('#reservation_hotel')
    let $startField= $('#reservation_startDate')
    let $endField= $('#reservation_endDate')
    // ... retrieve the corresponding form.
    let $form = $(this).closest('form');
    // Simulate form data, but only include the selected sport value.
    let data = {};
    data[$hotel.attr('name')] = $hotel.val();
    data[$startField.attr('name')] = $startField.val()
    data[$endField.attr('name')] = $endField.val()
    // Submit data via AJAX to the form's action path.
    $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        complete: function(html) {
        // Replace current position field ...
        $('#reservation_suite').replaceWith($(html.responseText).find('#reservation_suite'))
        $('#reservation_startDate').replaceWith($(html.responseText).find('#reservation_startDate'))
        $('#reservation_endDate').replaceWith($(html.responseText).find('#reservation_endDate'))
        // Position field now displays the appropriate positions.
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
                    console.log('Tu as merdé man !')
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

    
    
