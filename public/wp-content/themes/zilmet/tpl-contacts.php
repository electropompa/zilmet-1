<?php
/*
Template Name: Шаблон страницы контактов
*/
?>

<?php get_header(); ?>
<div class="col-xs-12 col-sm-8 col-md-9">

  <?php if(function_exists('dp_breadcrumb')){echo dp_breadcrumb();}  ?>
  <br>
  <div class="jshop" itemscope itemtype="http://schema.org/LocalBusiness">
    <h2><span itemprop="name">ГК Электропомпа</span> - Официальный представитель Zilmet в России</h2>


    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <p>Тел.:<a href="tel:+88001000077" rel="nofollow"> <span itemprop="telephone">8 800 100 00 77</span></a>,
        <a href="tel:+74959819244" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-44</span></a>, 
        <a href="tel:+74959819245" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-45</span></a>, 
        <a href="tel:+74959979715" rel="nofollow"> <span itemprop="telephone">+7 495 997-97-15</span></a>
        <br>
        e-mail: <span itemprop="email"><a href="mailto:zilmet@zilmet.ru" rel="nofollow">zilmet@zilmet.ru</a></span>,
        <span itemprop="email"><a href="mailto:electropompa@mail.ru" rel="nofollow"><b>electropompa@mail.ru</b></a></span>
      </p>

      <p><b>График работы:</b>
        <br>
        <time itemprop="openingHours" datetime="Mo-Th 09:00−18:00">С понедельника по четверг с 09-00 до 18-00</time>,
        <time itemprop="openingHours" datetime="Fr 09:00-17:00">по пятницам с 09-00 до 17-00</time>
      </p>
    </div>

    <div class="row">
      <div class="col-md-6">
        <p><b>Cклад в г. Долгопрудный:</b>
          <br>
          Лихачёвский проезд, д.8, стр.1 
          <br>
          Тел.: <a href="tel:+74956176163" target="_blank" rel="nofollow">+7 495 617-61-63</a>, <a href="tel:+79165175976" rel="nofollow">+7 916 517-59-76</a> 
          <br>
          <a href="/userfiles/schema.pdf" target="_blank" rel="nofollow"> Скачать схему проезда</a>
          <div id="map" style="height: 400px"></div>
        </p>
      </div>
      <div class="col-md-6">
        <p><b>Склад в г. Самара</b>
          <br>
          Самарская обл., с. Преображенка
          <br>
          Тел.:<a href="tel:+88001000077" rel="nofollow" target="_blank"> 8 800 100 00 77</a>
        </p>
        <br>
        <div id="samara-map" style="height: 400px"></div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <p><b>Сервисный центр:</b>
          <br>
        МО, г. Долгопрудный, Промышленный проезд, 14</p>
        <p>Телефон: <!-- <a href="tel:+79169027996" rel="nofollow">+7 916 902-79-96</a>,  --><a href="tel:+74956176942" target="_blank" rel="nofollow">+7 (495) 617-69-42</a>
          <br>
          Горячая линия: <a href="tel:88001000077" target="_blank" rel="nofollow">8 800 100 00 77</a> <br>
          E-mail: <!-- <a href="mailto:elservice@bk.ru" rel="nofollow">elservice@bk.ru</a>,  --><a href="mailto:service@electropompa.ru" target="_blank" rel="nofollow">service@electropompa.ru</a>
        </p>
        <div id="service-map" style="height: 400px"></div>
      </div>
      <div class="col-md-6">
        <div class="jshop" itemscope itemtype="http://schema.org/LocalBusiness">
          <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <p><b>Адрес офиса:</b>
            <br>
            <span itemprop="postalCode">141707</span>, МО, г. <span itemprop="addressLocality">Долгопрудный</span>, <span itemprop="streetAddress">Лихачёвский проезд, д.8</span></p>

            <p>Тел.:<a href="tel:+88001000077" rel="nofollow"> <span itemprop="telephone">8 800 100 00 77</span></a>,
              <a href="tel:+74959819244" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-44</span></a>, <br>
              <a href="tel:+74959819245" rel="nofollow"> <span itemprop="telephone">+7 495 981-92-45</span></a>, 
              <a href="tel:+74959979715" rel="nofollow"> <span itemprop="telephone">+7 495 997-97-15</span></a>
              <br>
              e-mail: <span itemprop="email"><a href="mailto:zilmet@zilmet.ru" rel="nofollow">zilmet@zilmet.ru</a></span>,
              <span itemprop="email"><a href="mailto:electropompa@mail.ru" rel="nofollow"><b>electropompa@mail.ru</b></a></span>
            </p>

          </div>
          <p><b>Реквизиты:</b><br>
            ИНН <span itemprop="vatID">7715956887</span> / КПП 771401001<br>
            ОГРН 1137746238838<br>
            ОКПО 17299167<br>
          </p>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>