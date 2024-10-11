<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\AbstractRepositoryInterface;
use App\Repositories\Eloquent\AbstractRepository;

//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractRepository implements AbstractRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(User $model){
        parent::__construct( $model );
    }
}
