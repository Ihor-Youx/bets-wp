var $ = jQuery; 
$(document).ready(function () {

	// Запрос на создание ставки
	$('#add_bet_wp input[type="submit"]').on('click', function (e) {

		e.preventDefault();
    var form = $('#add_bet_wp');
		var formData = form.serialize();
		$('input, textarea').removeClass('error_field');
		$.ajax({
        type: 'POST',
        url: bets_wp_ajax['url'],
        data: formData + '&action=create_bets_wp',
        success: function(data) {
            data = JSON.parse(data);
          if (data['message'] == 'error') {
              var err_input = data['name'].split('|');
              err_input = err_input.filter(function (el) {
					  return el != "";
					});
              for (var i = err_input.length - 1; i >= 0; i--) {
                $('[name='+ err_input[i] +']').addClass('error_field');
              }
              $('#response_bets_wp').html(data['text']);
              return;
          } else {
          	form[0].reset();
            $('input, textarea').removeClass('error_field');
            $('#response_bets_wp').html(data);
          }
           
        },

        error: function() {
           alert('Error');
        }
  });

	});


  $('#set_bet_vote input[type="submit"]').on('click', function (e) {
    e.preventDefault();
    // делаем проверку куки, если пользователь вручную удалил атрибут disabled
    if(Cookies.get('_bet_vote') != 'on') {
    var button = $(this);
    var form = $('#set_bet_vote');
    var formData = form.serialize();
    $('input, textarea').removeClass('error_field');
    $.ajax({
        type: 'POST',
        url: bets_wp_ajax['url'],
        data: formData + '&action=set_vote',
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
          if (data['message'] == 'error') {
              var err_input = data['name'].split('|');
              err_input = err_input.filter(function (el) {
            return el != "";
          });
              for (var i = err_input.length - 1; i >= 0; i--) {
                $('[name='+ err_input[i] +']').addClass('error_field');
              }
              $('#response_bets_vote_wp').html(data['text']);
              return;
          } else {
            form[0].reset();
            $('input, textarea').removeClass('error_field');
            $('#response_bets_vote_wp').html(data);


            var sended_bet_id_array = [];
            var current_bet_cookie = Cookies.get('_bet_vote');
            if (current_bet_cookie != undefined) {
               sended_bet_id_array = JSON.parse(current_bet_cookie);
            }
            sended_bet_id_array.push(form.find('input[name=bet_id]').val());
            Cookies.set('_bet_vote', JSON.stringify(sended_bet_id_array), { expires: 1 });
            button.prop( "disabled", true );
          }
           
        },

        error: function() {
           alert('Error');
        }
  });

  }


  });


});