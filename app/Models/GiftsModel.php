<?php

namespace App\Models;

use CodeIgniter\Model;

class GiftsModel extends Model
{
    protected $table            = 'gifts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['gifts_title', 'gifts_subtitle', 'gifts_info'];

    // Validation
    protected $validationRules = [
        'gifts_title' => 'required|is_unique[gifts.gifts_title]'
    ];
}
