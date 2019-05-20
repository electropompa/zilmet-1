          </div>
        </div>
      </div>
    </div>

  <footer role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-3">
          <a href="/bak/rasshiritelnye/cal-pro/" title="Расширительные баки">Расширительные баки</a><br>
          <a href="/baki/gidroakkumulyatory-ultra-pro/" title="Гидроаккумуояторы">Гидроаккумуляторы</a><br>
          <a href="/podbor-voda/" title="Подбор бака для водоснабжения">Подбор бака для водоснабжения</a><br>
          <a href="/podbor-otopol/" title="Подбор бака для отопления">Подбор бака для отопления</a>
        </div>
        <div class="col-12 col-md-3">
          <a href="/help/politika-konfidencialnosti/" title="Политика конфиденциальности">Политика конфиденциальности</a><br>
          <a href="/help/" title="Оплата и доставка">Оплата и доставка</a><br>
          <a href="/articles/">Статьи</a>
        </div>
        <div class="col-12 col-md-6">
          <p class="address text-right">
            +7 (495) 981-92-44, 8 800 100 00 77
            <br>
            <small>141707, МО, г. Долгопрудный, Лихачевский проезд, д.8 <br>
            OOO "Промкомплект" <br>
            ИНН/КПП 7714354583/771401001 <br>
            ОГРН 1157746829206</small>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <small>&copy; 2014 - <?=date('Y')?> ГК Электропомпа - Официальный сайт Zilmet в России</small>
        </div>
      </div>
    </div>
  </footer>
</div><!-- #container для PUSHY -->

<?php if ( is_active_sidebar( 'true_side' ) ) : ?>

  <div id="true-side" class="sidebar">
    <?php dynamic_sidebar( 'true_side' ); ?>
  </div>

<?php endif; ?>

<?php 
require 'includes/footer_scripts.php';
wp_footer();
?>
</body>
</html>