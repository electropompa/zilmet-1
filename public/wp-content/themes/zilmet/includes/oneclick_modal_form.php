<!-- Modal -->
<div class="modal fade" id="one_click_order" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="<?=get_bloginfo('template_url');?>/mail.php" method="post" name="oneclick_modal_form" id="oneclick_modal_form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderModalLabel">Заказ <span class="oneclickSku"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="onclickOrderName">Введите Имя</label>
            <input type="text" class="form-control" id="onclickOrderName" placeholder="Иван Иванов" name="oneClickOrderName" required="true">
          </div>
          <div class="form-group">
            <label for="oneclickOrderPhone">Номер телефона</label>
            <input type="tel" class="form-control" id="oneclickOrderPhone" placeholder="+7 999 999 99 99" name="oneClickOrderPhone" required="true">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="privacyCheckbox" required="true">
            <label class="form-check-label privacy-checkbox-label" for="privacyCheckbox">Я прочитал(а) и соглашаюсь с <a href="/help/politika-konfidencialnosti/" target="_blank" rel="nofollow">политикой конфиденциальности</a><span class="red">*</span></label>
          </div>
          <input type="hidden" name="oneclickOrderSku" value="">
          <input type="hidden" name="oneclickOrderQuantity" value="">
          <input type="hidden" name="oneclickOrderPrice" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="blue-button oneclickOrderSendButton" data-product-title="<?=get_the_title( absint( $product->get_id() ) );?>" data-product-sku="">Заказать</button>
        </div>
        <div class="form-result">
          <p class="text-center m-5">Ваша заявка успешно отправлена.<br>Мы перезвоним в ближайшее время.</p>
        </div>
      </div>
    </form>
  </div>
</div>