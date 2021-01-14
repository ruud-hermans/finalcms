<?php

namespace App\Models;

class FormTokenModel extends Model
{

    // Name of the table
    protected $model = "formtokens";

    protected $limit;

    // Non writable fields
    protected $protectedFields = [
        'id',
    ];

    public function __construct()
    {
        
    }

}