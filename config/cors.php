<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'], // Rutas que deseas habilitar para CORS
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'], // Métodos HTTP permitidos
    'allowed_origins' => ['http://localhost:5174'], // Orígenes permitidos
    'allowed_origins_patterns' => [], // Patrones de origen permitidos
    'allowed_headers' => ['*'], // Encabezados permitidos
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
