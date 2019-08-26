<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    <?php wp_title(); ?>
  </title>
  <?php $my_descr = get_post_meta($post->ID, "_aioseop_description", true);
  if ($my_descr) {
    echo  "<meta name='description' content='$my_descr'></p>";
  }
  ?>

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" />
  <?php wp_head() ?>
</head>

<!-- Начало переменных из полей ACF -->
<?
$address_short = get_field('address_short', 'option');
$logo = get_field('logo_dark', 'option');
$hotel_reserv_tel = get_field('hotel_reserv_tel', 'option');
$rest_reserv_tel = get_field('rest_reserv_tel', 'option');
$address_link = get_field('address_link', 'option');


// Функция для формирования ссылки телефона
function correctTelLink($tel)
{
  if ($tel) {
    $tel_num = preg_replace('~[^0-9]+~', '', $tel);
    $tel_first_num = substr($tel_num, 0, 1);
    if ($tel_first_num == '7') {
      $tel_link = '+' . $tel_num;
    } else {
      $tel_link = $tel_num;
    }
    echo $tel_link;
  }
}
?>
<!-- Конец переменных из полей ACF -->


<? if (is_front_page()) { ?>

<body class="home">
  <? } else { ?>

  <body class="current">
    <? } ?>

    <header>
      <section id="header-row">
        <div class="container-fluid">
          <div class="header-lang">
            <a href="#">
              Ru
            </a>
          </div>

          <div class="header-address">
            <? if ($address_short) : ?>
            <p class="header-title">Бесплатный трансфер</p>
            <p>
              <?= $address_short; ?>
            </p>
            <? endif; ?>
          </div>

          <div class="header-logo">
            <? if ($logo) : ?>
            <a href="/">
              <?= $logo; ?>
            </a>
            <? endif; ?>
          </div>

          <div class="header-tel-block">
            <div>
              <? if ($rest_reserv_tel) : ?>
              <p class="header-title">Заказ столика</p>
              <p>
                <a class="tel" href="tel:<? correctTelLink($rest_reserv_tel) ?>">
                  <?= $rest_reserv_tel; ?>
                </a>
              </p>
              <? endif; ?>

            </div>
            <div>
              <? if ($hotel_reserv_tel) : ?>
              <p class="header-title">Для брони номера</p>
              <p>
                <a class="tel" href="tel:<? correctTelLink($hotel_reserv_tel) ?>">
                  <?= $hotel_reserv_tel; ?>
                </a>
              </p>
              <? endif; ?>
            </div>
          </div>

        </div>

        <div class="header-tel-btn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.09 22.5">
            <path class="cls-2" d="M7.86,10.28c.6,2.38,2.33,3.4,4.54,3.78a6.59,6.59,0,0,0,4.76-.9,4.1,4.1,0,0,0,2-2.87l.16,0a4.67,4.67,0,0,1,3,2.74,20.55,20.55,0,0,1,1.49,5c.12.72.2,1.45.28,2.18a1.21,1.21,0,0,1-.95,1.5,13.28,13.28,0,0,1-2.41.52,84.11,84.11,0,0,1-10.53.24A28.65,28.65,0,0,1,4.89,22a5.22,5.22,0,0,1-1.1-.35A1.2,1.2,0,0,1,3,20.23a23.51,23.51,0,0,1,.8-4.48A14.51,14.51,0,0,1,5.2,12.23,4.44,4.44,0,0,1,7.86,10.28Zm5.71,9.92H10.86c-.26,0-.46.08-.51.36s.16.49.52.49H16.2c.34,0,.53-.17.53-.44s-.19-.42-.54-.42Z" />
            <path class="cls-2" d="M13,0a45.4,45.4,0,0,1,8.26.58A16.82,16.82,0,0,1,24,1.34a4.81,4.81,0,0,1,2.59,2.19,6.85,6.85,0,0,1,.46,1.32c.07.22-.05.32-.25.4a6.29,6.29,0,0,1-3.74.25,8.79,8.79,0,0,1-2.86-1.2,1.16,1.16,0,0,1-.53-.54,1.2,1.2,0,0,0-.79-.68,14.25,14.25,0,0,0-2.13-.48,29.07,29.07,0,0,0-6.85,0,9.77,9.77,0,0,0-1.68.4,1.5,1.5,0,0,0-1,1,.22.22,0,0,1-.09.14A9.21,9.21,0,0,1,2.91,5.67,5.9,5.9,0,0,1,.22,5.23.3.3,0,0,1,0,4.84,3.21,3.21,0,0,1,.58,3.32,6.08,6.08,0,0,1,4.23.92,28.65,28.65,0,0,1,9.82.12C11.07,0,12.32,0,13,0Z" />
            <path class="cls-2" d="M16.89,6.31a7,7,0,0,0-6.7,0c0-.27,0-.52,0-.76a.21.21,0,0,0-.2-.26c-.25-.06-.49-.16-.74-.22A1.15,1.15,0,0,1,8.34,4l0-.17c-.07-.54-.06-.55.46-.69L9.22,3l.09.19a1.35,1.35,0,0,0,1.31.91c1.93,0,3.85,0,5.77,0A1.45,1.45,0,0,0,17.81,3c.29.08.57.14.85.23a.2.2,0,0,1,.11.17,4.3,4.3,0,0,1-.21,1.09A1.18,1.18,0,0,1,18,5a3.4,3.4,0,0,1-.82.26c-.25,0-.31.17-.29.4S16.89,6.07,16.89,6.31Z" />
            <path class="cls-2" d="M13.53,11.38a2.64,2.64,0,0,1-1.74-.59,1.47,1.47,0,0,1,0-2.36,2.86,2.86,0,0,1,3.63.06,1.46,1.46,0,0,1,0,2.22A2.65,2.65,0,0,1,13.53,11.38Z" />
            <path class="cls-2" d="M27,6.16c-.18.8-.46,1.47-1.28,1.71a6,6,0,0,1-5.22-.72A1.18,1.18,0,0,1,19.93,6a7.42,7.42,0,0,0,0-.83A7.85,7.85,0,0,0,27,6.16Z" />
            <path class="cls-2" d="M7.15,5.16c0,.34,0,.62,0,.9A1.17,1.17,0,0,1,6.6,7.13a5.44,5.44,0,0,1-2.48,1,6,6,0,0,1-2.73-.21A1.85,1.85,0,0,1,.1,6.17C2.6,7.08,4.9,6.5,7.15,5.16Z" />
            <path class="cls-2" d="M8.12,10a4.38,4.38,0,0,0,2.83,3,6.63,6.63,0,0,0,5.84-.32A4,4,0,0,0,18.93,10l.07,0a10.27,10.27,0,0,1-.36,1.11,4.37,4.37,0,0,1-2.46,2.2,6.66,6.66,0,0,1-5.9-.31,3.89,3.89,0,0,1-2.13-2.78A2.13,2.13,0,0,1,8.12,10Z" />
            <path class="cls-2" d="M15.7,12.92A3.27,3.27,0,0,1,15,12.6a.52.52,0,0,1,.13-.94,1.09,1.09,0,0,1,1.05.06.63.63,0,0,1,.35.58.58.58,0,0,1-.48.51c-.1,0-.21,0-.31.06Z" />
            <path class="cls-2" d="M13.05,13.2H13c-.49,0-.84-.35-.81-.7a.79.79,0,0,1,.89-.59,1.35,1.35,0,0,1,.57.17.53.53,0,0,1,0,1,2.43,2.43,0,0,1-.54.17Z" />
            <path class="cls-2" d="M14.87,6.16a1.11,1.11,0,0,1,.89.36.51.51,0,0,1-.11.78,1.12,1.12,0,0,1-1.31-.09.53.53,0,0,1,.11-.92A3.11,3.11,0,0,1,14.87,6.16Z" />
            <path class="cls-2" d="M17.26,8.66a1.12,1.12,0,0,1-.87-.38.54.54,0,0,1,.25-.9,1.1,1.1,0,0,1,.92.12.69.69,0,0,1,.41.72A.67.67,0,0,1,17.26,8.66Z" />
            <path class="cls-2" d="M12.45,7.37c-.5,0-.9-.3-.89-.67s.43-.64.91-.63.87.31.86.68S12.92,7.37,12.45,7.37Z" />
            <path class="cls-2" d="M9.7,10.26l-.21,0c-.46-.07-.77-.35-.75-.69A.74.74,0,0,1,9.6,9a1.43,1.43,0,0,1,.6.17.53.53,0,0,1,0,1A3,3,0,0,1,9.7,10.26Z" />
            <path class="cls-2" d="M17.33,11.37a1,1,0,0,1-.78-.42.52.52,0,0,1,.26-.84,1.06,1.06,0,0,1,.92.09.68.68,0,0,1,.42.77C18.08,11.23,17.8,11.38,17.33,11.37Z" />
            <path class="cls-2" d="M10.38,12.24c-.49-.05-.86-.32-.87-.66a.76.76,0,0,1,.81-.66,1.49,1.49,0,0,1,.69.16.51.51,0,0,1,0,.9A4.2,4.2,0,0,1,10.38,12.24Z" />
            <path class="cls-2" d="M10.34,7.14a1,1,0,0,1,.83.46.51.51,0,0,1-.28.81,1.06,1.06,0,0,1-1-.14.66.66,0,0,1-.34-.75C9.64,7.28,9.91,7.13,10.34,7.14Z" />
          </svg>
        </div>
      </section>

      <!-- Начало основного меню  -->
      <section id="header-menu">
        <div class="container-fluid">
          <div class="gamurger-block">
            <div class="gamburger-btn">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="main-menu">
            <?
            $args = array(
              'theme_location' => 'header_menu'
            );
            wp_nav_menu($args);
            ?>
          </div>
          <div class="call-back-btn">
            Перезвоните мне
          </div>

        </div>
        <? if ($address_link) : ?>
        <a href="<?= $address_link; ?>" target="_blank" class="header-map-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.46 31">
            <path class="cls-2" d="M10.23,31c-.25-1-.47-2-.74-2.93A23.79,23.79,0,0,0,5,19.88c-1.11-1.38-2.21-2.77-3.26-4.19A9.74,9.74,0,0,1,2.85,3.28,10.66,10.66,0,0,1,9.22.1a10.73,10.73,0,0,1,11.28,6,9.35,9.35,0,0,1-.08,8.39,20.71,20.71,0,0,1-2.21,3.17c-1.26,1.63-2.62,3.19-3.86,4.84a25.6,25.6,0,0,0-4,8.24A2.56,2.56,0,0,0,10.23,31ZM5.81,9.73a4.9,4.9,0,1,0,4.9-4.92A4.9,4.9,0,0,0,5.81,9.73Z" />
          </svg>

        </a>
        <? endif; ?>
      </section>
      <!-- Конец основного меню  -->
    </header>
    <!-- Конец шапки -->



    <!-- Начало хлебных крошек -->
    <? if (!(is_front_page())) { ?>
    <div class="breadcrumb">
      <?php
      if (function_exists('bcn_display')) {
        bcn_display();
      }
      ?>
    </div>
    <?};?>
    <!-- Конец хлебных крошек -->

    <section>
      <div class="container">
        <div class="full">
          <div style="max-width:300px;">
            <?= $logo_dark; ?>
          </div>
          <p>
            <a href="tel:<?= $tel_link ?>">
              <? the_field('telephone', 'option'); ?>
            </a>
          </p>
          <h1>H1 Заголовок</h1>
          <h2>H2 заголовок</h2>
          <p class="text-title">Текстовый заголовок</p>
        </div>
      </div>
    </section>