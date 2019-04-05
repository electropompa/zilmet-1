        </div>
      </div>
    </div>
  </div>
</main>
<footer role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="/bak/rasshiritelnye/cal-pro/" title="Расширительные баки">Расширительные баки</a><br>
        <a href="/baki/gidroakkumulyatory-ultra-pro/" title="Гидроаккумуояторы">Гидроаккумуляторы</a><br>
        <a href="/podbor-voda/" title="Подбор бака для водоснабжения">Подбор бака для водоснабжения</a><br>
        <a href="/podbor-otopol/" title="Подбор бака для отопления">Подбор бака для отопления</a>
      </div>
      <div class="col-md-3">
        <a href="/politika-konfidencialnosti/" title="Политика конфиденциальности">Политика конфиденциальности</a><br>
        <a href="/help/" title="Оплата и доставка">Оплата и доставка</a><br>
        <a href="/articles/">Статьи</a>
      </div>
      <div class="col-md-6">
        <p class="address text-right">
          +7 (495) 981-92-44, 8 800 100 00 77
          <br>
          <small>141707, МО, г. Долгопрудный, Лихачевский проезд, д.8 <br>
          OOO "Промкомплект" <br>
          ИНН 7714354583 <br>
          КПП 771401001 <br>
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

<?php if ( is_active_sidebar( 'true_side' ) ) : ?>
 
  <div id="true-side" class="sidebar">
    <?php dynamic_sidebar( 'true_side' ); ?>
  </div>
 
<?php endif; ?>

<?php //require_once 'modal_form.php'; ?>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter21631393 = new Ya.Metrika({ id:21631393, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/21631393" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-83699439-2', 'auto');
  ga('send', 'pageview');
</script>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
	(function(){ var widget_id = '151500';
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<?php 
  wp_enqueue_script( 'jquery' ); 
  wp_enqueue_script( 'bootstrap' ); 
  wp_footer(); 
  ?>
</body>
</html>