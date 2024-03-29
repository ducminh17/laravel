<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
/**
 * Class BaseService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{   
    protected $model;
    public function __construct(
        Model $model
    ){
       $this->model=$model;
    }
    public function all(){
        return $this->model->all();
    }
    public function findById(int $modelId, array $columns = ['*'], array $relations = [])
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId);
    }
}
