# WooCommerce Sales Report for Laravel

A Laravel package to fetch and display WooCommerce orders directly from the database without using the WooCommerce API.

## Requirements

- PHP 8.2 or higher
- Laravel 12.x
- Access to WooCommerce database

## Installation

1. Install the package via Composer:

```bash
composer require boukjijtarik/report
```

2. Publish the configuration file:

```bash
php artisan vendor:publish --provider="WooSales\Report\WooSalesReportServiceProvider"
```

3. Configure your WooCommerce database connection in your `.env` file:

```env
WC_DB_CONNECTION=mysql
WC_DB_HOST=127.0.0.1
WC_DB_PORT=3306
WC_DB_DATABASE=wordpress
WC_DB_USERNAME=root
WC_DB_PASSWORD=
WC_TABLE_PREFIX=wp_
```

If your WooCommerce database is the same as your Laravel application's database, you can skip this step as the package will use your default database connection.

## Usage

The package provides two routes:

1. Order List: `/woo-orders`
   - Displays a paginated list of all WooCommerce orders
   - Shows order ID, date, status, and total amount
   - Provides links to view detailed order information

2. Order Details: `/woo-orders/{id}`
   - Shows detailed information about a specific order
   - Displays customer information
   - Lists order items with quantities and prices
   - Shows order status and total amount

## Customization

### Views

The package comes with pre-built views using Tailwind CSS. If you want to customize them, publish the views to your application:

```bash
php artisan vendor:publish --provider="WooSales\Report\WooSalesReportServiceProvider" --tag="views"
```

### Configuration

You can modify the configuration file `config/woo-sales-report.php` to change:

- Database connection settings
- Table prefix
- Number of items per page

## Security

This package accesses your WooCommerce database directly. Make sure to:

1. Use a read-only database user if possible
2. Properly configure your database connection
3. Implement appropriate authentication middleware for the routes

## License

This package is open-sourced software licensed under the MIT license. 