<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAddressModel extends Model
{
    protected $table = 'user_addresses';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'title',
        'full_name',
        'phone',
        'city',
        'district',
        'full_address',
        'is_default'
    ];

    protected $useTimestamps = true;
}