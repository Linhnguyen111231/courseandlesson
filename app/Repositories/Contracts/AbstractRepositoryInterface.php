<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface
{
    public function findAllBy($field, $values, $operator = '=', $orderByField = null, $sortOrder = 'asc');
}
