<button type="button" class="call-back-button" data-toggle="modal" data-target="#callBackModal">
  <img src="/images/phone-icon.svg" alt="Заказать обратный звонок" width="42">
</button>

<!-- Modal -->
<div class="modal fade" id="callBackModal" tabindex="-1" role="dialog" aria-labelledby="callBackModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="callBackModalTitle">Заказать обратный звонок</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="/wp-content/themes/zilmet/mail.php" method="POST" class="call-back-form">
      
        <div class="modal-body">
          <div class="form-group">
            <label for="inputName">Ваше имя</label>
            <input type="name" name="name" class="form-control" id="inputName" placeholder="Иван Иванов">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Номер телефона <span class="red">*</span></label>
            <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="+7 (495) 999-99-99" required="true">
            <small id="emailHelp" class="form-text text-muted">Мы перезвоним Вам в ближайшее время</small>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="privacyCheck" required="true">
            <label class="form-check-label" for="privacyCheck">Принимаю <a href="/politika-konfidencialnosti/" target="_blank" rel="nofollow">политику конфиденциальности</a> <span class="red">*</span></label>
          </div>
        </div><!-- modal-body -->

        <div class="modal-footer">
          <button type="submit" class="blue-button">Отправить заявку</button>
        </div>

      </form>
      
      <!-- result -->
      <div class="form-result text-center">
        <p>Спасибо за Вашу заявку!</p>
        <p>Мы перезвоним Вам в ближайшее время</p>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->