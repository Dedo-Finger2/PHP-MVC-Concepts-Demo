<?php 

// Requirindo o autodload.php do Composer, arquivo que carrega as classes do sistema para que possam ser usadas
require __DIR__.'/vendor/autoload.php'; 

use app\controller\pages\Home;

echo Home::getHome();
