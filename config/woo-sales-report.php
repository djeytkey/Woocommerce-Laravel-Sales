<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WooCommerce Database Connection
    |--------------------------------------------------------------------------
    |
    | Here you can specify the database connection for your WooCommerce installation.
    | By default, it will use the same connection as your Laravel application.
    |
    */
    'database' => [
        'connection' => env('DB_CONNECTION', 'mysql'),
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'wordpress'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | WooCommerce Table Prefix
    |--------------------------------------------------------------------------
    |
    | Specify the table prefix used in your WooCommerce installation.
    | Default is 'wp_' but you might have a different prefix.
    |
    */
    'table_prefix' => env('DB_TABLE_PREFIX', 'wp_'),

    /*
    |--------------------------------------------------------------------------
    | Items Per Page
    |--------------------------------------------------------------------------
    |
    | Number of orders to display per page in the orders list.
    |
    */
    'items_per_page' => 20,
]; 