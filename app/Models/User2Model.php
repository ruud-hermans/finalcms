<?php

namespace App\Models;

use App\Libraries\MySql;
use App\Libraries\QueryBuilder;
use PDO;

class User2Model extends Model
{
    // Name of the table
    protected $model = "users2";

    // Max number of records when fetching all records from table
    protected $limit;

    // Non writable fields
    protected $protectedFields = [
        'id',
        'updated',
        'deleted',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Load class 'staticaly'
     */
    public static function load()
    {
        return new static;
    }

    public function __construct()
    {
        parent::__construct(
            $this->model, 
            $this->limit, 
            $this->protectedFields
        );   
    }

}