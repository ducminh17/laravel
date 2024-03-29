<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseRepositoryInterface
 * @package App\Services\Interfaces
 */
interface  BaseRepositoryInterface
{
   public function all();
    public function findById(int $id);
}
