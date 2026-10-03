<?php

// Pastikan Vercel menggunakan folder /tmp untuk compiled views & session
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';
$_ENV['LARAVEL_STORAGE_PATH'] = '/tmp';

require __DIR__ . '/../public/index.php';