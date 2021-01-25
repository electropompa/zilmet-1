<?php
/*
Template Name: Шаблон страницы контактов
*/
?>

<?php get_header(); ?>
  <div class="col-12 col-sm-8 col-md-9">
		<?= function_exists( 'dp_breadcrumb' ) ? dp_breadcrumb() : '' ?>
    <div class="jshop" itemscope itemtype="http://schema.org/LocalBusiness">
      <h2><span itemprop="name">ГК Электропомпа</span> - Официальный представитель Zilmet в России</h2>
      <div class="mb-5" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <p>Тел.:<a href="tel:+88001000077" rel="nofollow"> <span itemprop="telephone">8 800 100 00 77</span></a>,
          <a href="tel:+74959819244" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-44</span></a>,
          <a href="tel:+74959819245" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-45</span></a>,
          <a href="tel:+74959979715" rel="nofollow"> <span itemprop="telephone">+7 495 997-97-15</span></a>
          <br> e-mail:
          <span itemprop="email"><a href="mailto:zilmet@zilmet.ru" rel="nofollow">zilmet@zilmet.ru</a></span>,
          <span itemprop="email"><a href="mailto:electropompa@mail.ru" rel="nofollow"><b>electropompa@mail.ru</b></a></span>
        </p>
      </div>

      <div class="row">
        <div class="col-12 col-md-6">
          <h2><b>Пункт самовывоза м. Речной вокзал</b></h2>
          <p>
            <b>Сервисный центр GRUNDFOS</b> <br> г. Москва, Лавочкина ул., д. 34<br> <b>Режим работы:</b>
            <time itemprop="openingHours" datetime="Mo-Th 09:00−18:00">Пн-Пт с 9 до 18</time>
            <!--                        <time itemprop="openingHours" datetime="Fr 09:00-17:00">Сб: 10 до 16</time>-->
            <br> Тел.: <a href="tel:+79153673398" target="_blank" rel="nofollow">+7 915 367-33-98 </a><br>
          </p>
          <p>
            <a href="/userfiles/schema-moscow.pdf" target="_blank" rel="nofollow"><img src="/images/download.svg" alt="" width="16"> Скачать схему проезда</a>
          </p>
          <div id="moscow-service-map" style="height: 400px"></div>
          <p><b>ВНИМАНИЕ!!!!</b> Пункт выдачи находится в ЖК Янтарный, в помещении
            <b>Сервисного Центра GRUNDFOS</b> между магазином <img src="/images/vkusvill.png" alt="" width="90"> и кафе
            <img src="/images/skalka.png" alt="" width="90">, серая арка, дверь налево</p>
          <p><img src="/images/grundfos-service-383.jpg" alt="Пункт выдачи заказов на Лавочкина"></p>
          <p>
            <a href="/images/proftechservice_adress_pr_3.jpg" rel="lightbox"><img src="/images/proftechservice_adress_pr_3.jpg" alt="" width="100%"></a>
          </p>
        </div>

        <div class="col-12 col-md-6 mb-3">
          <h2><b>Пункт самовывоза на территории склада в г. Долгопрудный:</b></h2>
          <p>Лихачёвский проезд, д.8, стр.1 <br> <b>Режим работы: </b> Пн-Чт с 9 до 18, Пт с 9 до 17 <br>
            Тел.: <a href="tel:+74956176163" target="_blank" rel="nofollow">+7 495 617-61-63</a>,
            <a href="tel:+79165175976" rel="nofollow">+7 916 517-59-76</a>
          </p>
          <p>
            <a href="/userfiles/schema.pdf" target="_blank" rel="nofollow"><img src="/images/download.svg" alt="" width="16">Скачать схему проезда</a>
          </p>
          <div id="map" class="mb-3" style="height: 350px"></div>
          <p><img src="/images/sklad.jpg" alt=""></p>

          <h2 class="mt-5"><b>Склад в г. Краснодар у дилера ООО "Техно-Полив"</b></h2>
          <p>Продукция в наличии.</p>
          <div class="jshop">
            <p>350056, г. Краснодар, ул.Евдокимовская, д. 123</p>
            <p>Тел.:<a href="tel:+79282024242" rel="nofollow" target="_blank"> +7 (928) 202 42 42</a>, <br>
              e-mail: <a href="mailto:agrokey1@mail.ru" rel="nofollow" target="_blank">agrokey1@mail.ru</a></p>
          </div>
          <div id="krasnodarMap" style="height: 400px"></div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <p><b>Сервисный центр:</b> <br> МО, г. Долгопрудный, Промышленный проезд, 14 <br> Телефон:
            <!-- <a href="tel:+79169027996" rel="nofollow">+7 916 902-79-96</a>,  --><a href="tel:+74956176942" target="_blank" rel="nofollow">+7 (495) 617-69-42</a>
            <br>
            Горячая линия: <a href="tel:88001000077" target="_blank" rel="nofollow">8 800 100 00 77</a> <br>
            E-mail: <!-- <a href="mailto:elservice@bk.ru" rel="nofollow">elservice@bk.ru</a>,  --><a href="mailto:service@electropompa.ru" target="_blank" rel="nofollow">service@electropompa.ru</a>
          </p>
          <div id="service-map" style="height: 400px"></div>
        </div>


        <div class="col-12 col-md-6">
          <div class="jshop" itemscope itemtype="http://schema.org/LocalBusiness">
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
              <p><b>Адрес офиса:</b> <br> <span itemprop="postalCode">141707</span>, МО, г.
                <span itemprop="addressLocality">Долгопрудный</span>,
                <span itemprop="streetAddress">Лихачёвский проезд, д.8</span></p>
              <p>Тел.:<a href="tel:+88001000077" rel="nofollow"> <span itemprop="telephone">8 800 100 00 77</span></a>,
                <a href="tel:+74959819244" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-44</span></a>, <br>
                <a href="tel:+74959819245" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-45</span></a>,
                <a href="tel:+74959979715" rel="nofollow"> <span itemprop="telephone">+7 495 997-97-15</span></a> <br>
                e-mail:
                <span itemprop="email"><a href="mailto:zilmet@zilmet.ru" rel="nofollow">zilmet@zilmet.ru</a></span>,
                <span itemprop="email"><a href="mailto:electropompa@mail.ru" rel="nofollow"><b>electropompa@mail.ru</b></a></span>
              </p>
            </div>
            <p><b>Реквизиты:</b><br> ООО "Электропомпа"<br> ИНН <span itemprop="vatID">5047194022</span> / КПП 772901001<br> ОГРН 1175029003665<br> ОКПО 06517365
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php get_footer(); ?>