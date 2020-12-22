<?php
/*
Plugin Name: Meteo_App
Plugin URI: https://github.com/Cpradlls/Chateau_Marguerite.git
Description: Affiche la méteo actuelle à Prévenchères
Author: Pradeilles Chloé
Version: 1.0
Author URI: https://alainackerman.go.yj.fr/
*/
// function meteoapp() {
//   $info = '<a href="http://api.openweathermap.org/data/2.5/weather?q=Prévenchères,fr&APPID=9d9649b043f57b90f8d892a6e650806b" target="_blank" class="meteoapp">
//           </a>';
//   echo $info;
// }

add_action( 'wp_footer', 'Meteo_App' );

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'swp_register_plugin_styles' );
/**
 * Register style sheet.
 */
function swp_register_plugin_styles() {
  wp_register_style( 'Meteo_App-style', plugins_url( 'Meteo_App/assets/css/plugin.css' ) );
  wp_enqueue_style( 'Meteo_App-style' );
}

function Meteo_App() {
  $url = 'http://api.openweathermap.org/data/2.5/weather?q=Prévenchères,fr&APPID=9d9649b043f57b90f8d892a6e650806b';
  $raw = file_get_contents($url);
  $json = json_decode($raw);
  $ciel = $json->weather[0]->description;
  $temp = $json->main->temp - 273.15;
  
      echo "
      <div class='Meteo_App'>
          <h2>Météo : </h2>
          <h3>$temp °c</h3>
          </div>
      ";
}
?>