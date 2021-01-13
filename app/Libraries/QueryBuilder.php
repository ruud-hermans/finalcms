<?php

namespace App\Libraries;

class QueryBuilder
{
    public $queryBuilder = '';

    /**
     * Select fields
     * @param $fields (array) optional: fields to be selected
     */
    public function select(Array $fields = [])
    {
        if (count($fields) === 0) {
            $fields = ['*'];
        }

        $selectFields = '';

        foreach($fields as $field)
        {
            $selectFields .= $this->composeField($field) . ", ";
        }

        $this->queryBuilder .=  "SELECT " . rtrim($selectFields, ',' . chr(32));

        return $this;
    }

    /**
     * 
     */
    public function from($table)
    {
        $this->queryBuilder .= " FROM `{$table}`";

        return $this;
    }

    /**
     * 
     */
    public function where($field, $operator, $value)
    {
        $field = $this->composeField($field);
        
        $this->queryBuilder .= " WHERE {$field}{$operator}{$value}";

        return $this;
    }

    /**
     * 
     */
    public function whereAnd($field, $operator, $value)
    {
        $field = $this->composeField($field);

        $this->queryBuilder .= " AND ({$field}{$operator}{$value})";

        return $this;
    }

    /**
     * 
     */
    public function whereIsNull($field, $and = false)
    {
        $field = $this->composeField($field);

        $this->queryBuilder .= ($and ? ' AND (' : '') . "`{$field}` IS NULL " . ($and ? ')' : '');

        return $this;
    }

    /**
     * 
     */
    public function join($joinTable, $foreignKey, $table, $primaryKey = 'id')
    {
        $this->queryBuilder .= " LEFT JOIN `{$joinTable}` ON `{$joinTable}`.`{$foreignKey}`=`{$table}`.`{$primaryKey}`";

        return $this;
    }

    public function orderBy(array $fields)
    {
        $composeFields = '';

        foreach($fields as $field)
        {
            $composeFields .= $this->composeField($field);
        }

        $this->queryBuilder .= " ORDER BY " . rtrim($composeFields, ',');

        return $this;
    }

    public function groupBy(array $fields)
    {
        $composeFields = '';

        foreach($fields as $field)
        {
            $composeFields .= $this->composeField($field);
        }

        $this->queryBuilder .= " GROUP BY " . rtrim($composeFields, ',');

        return $this;
    }

    public function limit($limit)
    {
        $this->queryBuilder .= " LIMIT {$limit}";

        return $this;
    }

    /**
     * 
     */
    public function get()
    {
        return $this->queryBuilder;
    }

    /**
     * 
     */
    private function composeField($field)
    {
        $expl = explode('.', $field);
        return (count($expl) == 1 ? "`$field`" : "`$expl[0]`.`$expl[1]`");
    }
}