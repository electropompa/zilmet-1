(function($){
  $(function(){

    //маска номера телефона
    $('[type="tel"]').mask("+7 (999) 999-99-99");

    // Отправка формы
    $('.call-back-form').submit(function(e){
      e.preventDefault();
      var m_method=$(this).attr('method');
      var m_action=$(this).attr('action');
      var m_data=$(this).serialize();
      $.ajax({
        type: m_method,
        url: m_action,
        data: m_data,
        success: function(result){
          $('.modal-title').css("visibility", "hidden");
          $('.call-back-form').css("display", "none");
          $('.form-result').css("display", "block");
        }
      });
    });

      // Заказ в один клик
    $('#oneclick_modal_form').submit(function(e){
      e.preventDefault();
      var m_method=$(this).attr('method');
      var m_action=$(this).attr('action');
      var m_data=$(this).serialize();
      $.ajax({
        type: m_method,
        url: m_action,
        data: m_data,
        success: function(result){
          $('.modal-title').css("visibility", "hidden");
          $('.modal-body, .modal-footer').css("display", "none");
          $('.form-result').css("display", "block");
          yaCounter21631393.reachGoal('oneclick');
        }
      });
    });

    $('.one_click_order_button').on('click', function(){
      var sku       = $(".sku").html();
      var quantity  = $('input[name="quantity"]').val();
      var price     = $('.woocommerce-Price-amount').html().replace(/<\/?[^>]+>/g,'').replace('&nbsp;',' ');

      $('.oneclickOrderSendButton').attr('data-product-sku', sku);
      $('.oneclickSku').html( "арт. " + sku);
      $('input[name="oneclickOrderSku"]').val(sku);
      $('input[name="oneclickOrderQuantity"]').val(quantity);
      $('input[name="oneclickOrderPrice"]').val(price);
    });

        // Отправка письма директору
      $('#sendQuestionForm').submit(function(e){
          e.preventDefault();
          var m_method=$(this).attr('method');
          var m_action=$(this).attr('action');
          var m_data=$(this).serialize();
          $.ajax({
              type: m_method,
              url: m_action,
              data: m_data,
              success: function(result){
                  console.log(result);
                  $('#questionForm .modal-title').css("visibility", "hidden");
                  $('#questionForm .modal-body, #sendQuestionForm .modal-footer').css("display", "none");
                  $('#questionForm .form-result').css("display", "block");
              }
          });
      });

  });
})(jQuery);