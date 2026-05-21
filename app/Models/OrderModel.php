<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'total_price',
        'used_balance',
        'paid_amount',
        'payment_status',
        'card_last4',
        'coupon_code',
        'discount_amount',
        'status',
        'shipping_address'
    ];
}