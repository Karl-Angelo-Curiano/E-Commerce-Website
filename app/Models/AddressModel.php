<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'address',
        'city',
        'province',
        'zip_code'
    ];

    protected $useTimestamps = true;
}