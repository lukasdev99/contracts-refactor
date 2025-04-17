<?php

namespace App\Database;

use Exception;

class BaseModel extends DbManager
{
    protected string $table;
    
    public function __construct()
    {
        parent::__construct();
    }

    protected function mapAttributes(array $data): array
    {
        return array_map(fn($value, $key) => 
            method_exists($this, $getter = 'get' . ucfirst($key) . 'Attribute')
                ? $this->$getter($value)
                : $value,
            $data,
            array_keys($data)    
        );
    }

    public function find(mixed $value, string $column = 'id', ?string $orderBy, string $sort = 'ASC'): ?array
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = :value";
        if($orderBy)
            $sql .= " ORDER BY {$orderBy} {$sort}";
        
        $sql .= ' LIMIT 1';
        $result = $this->fetch($sql, ['value' => $value]);
        return $result ? $this->mapAttributes($result) : null;        
    }

    public function findOrFail(mixed $value, string $column = 'id', ?string $orderBy, string $sort = 'ASC'): array
    {
        $result = $this->find($value, $column, $orderBy, $sort);
        return $result ?: throw new Exception("Record not found in {$this->table} where {$column} = {$value}");
    }
}