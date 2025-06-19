<?php

namespace WooSales\Report\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection;
    protected $table;
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        $this->connection = config('woo-sales-report.database.connection');
        $this->table = config('woo-sales-report.table_prefix') . 'posts';
    }

    public function scopeOrders($query)
    {
        return $query->where('post_type', 'shop_order')
                    ->orderBy('post_date', 'desc');
    }

    public function getMeta($key)
    {
        $prefix = config('woo-sales-report.table_prefix');
        
        return \DB::connection($this->connection)
            ->table($prefix . 'postmeta')
            ->where('post_id', $this->ID)
            ->where('meta_key', $key)
            ->value('meta_value');
    }

    public function getCustomer()
    {
        return [
            'first_name' => $this->getMeta('_billing_first_name'),
            'last_name' => $this->getMeta('_billing_last_name'),
            'email' => $this->getMeta('_billing_email'),
            'phone' => $this->getMeta('_billing_phone')
        ];
    }

    public function getTotal()
    {
        return $this->getMeta('_order_total');
    }

    public function getStatus()
    {
        return str_replace('wc-', '', $this->post_status);
    }
} 