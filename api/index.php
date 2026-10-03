<?php

// Set folder storage ke /tmp milik Vercel sebelum Laravel dijalankan
$_ENV['LARAVEL_STORAGE_PATH'] = '/tmp';

require __DIR__ . '/../public/index.php';