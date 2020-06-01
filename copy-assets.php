<?php
require './vendor/autoload.php';

$fs = new Symfony\Component\Filesystem\Filesystem();

$vendorDir = './vendor/';
$publicDir = './public/vendor/';

$assets = [
    // jQuery 2
    'components/jquery/',
    // Bootstrap 3
    'twitter/bootstrap/dist/',
    // AdminLTE 2.4
    'almasaeed2010/adminlte/dist/',
    // Font Awesome 4
    'fortawesome/font-awesome/css/',
    'fortawesome/font-awesome/fonts/',
];

foreach ($assets as $value) {
    $fs->mirror($vendorDir.$value, $publicDir.$value);
}