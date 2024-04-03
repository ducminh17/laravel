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
    public function pagination(
        array $column = ['*'],
        array $condition =[],
        array $join =[],
        int $perPage = 20
    ){
        $query=$this->model->select($column)->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where('name','LIKE','%'.$condition['keyword'].'%');
            }
        });
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perPage);
    }
    public function create(array $payload = []){
        $model= $this->model->create($payload);
        return $model->fresh();
    }
    public function update(int $id = 0, array $payload = []){
        $model = $this->findById($id);
        return $model->update($payload);
    }
    public function delete(int $id = 0){
        return $this->findById($id)->delete();
    }
    public function forceDelete(int $id = 0){
        return $this->findById($id)->forceDelete();
    }
    public function all(){
        return $this->model->all();
    }
    public function findById(int $modelId, array $columns = ['*'], array $relations = [])
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId);
    }
}
