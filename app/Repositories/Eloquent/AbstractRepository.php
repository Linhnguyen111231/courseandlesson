<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\AbstractRepositoryInterface;

abstract class AbstractRepository implements AbstractRepositoryInterface
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    //Tìm theo một mảng các điều kiện
    public function findAllBy($field, $values, $operator = '=', $orderByField = null, $sortOrder = 'asc')
    {
        $query = $this->model->where($field, $operator, $values);
    
        if ($orderByField) {
            $query = $query->orderBy($orderByField, $sortOrder);
        }
    
        return $query->get();
    }
    
}
