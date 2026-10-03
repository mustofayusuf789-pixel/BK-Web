<?php

// Pastikan direktori temporer di /tmp siap digunakan oleh Laravel
$tmpStorage = '/tmp/storage';
$directories = [
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/cache',
    $tmpStorage . '/logs',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Redirect path storage dan compiled view Laravel ke /tmp
$_ENV['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_ENV['VIEW_COMPILED_PATH'] = $tmpStorage . '/framework/views';

require __DIR__ . '/../public/index.php';