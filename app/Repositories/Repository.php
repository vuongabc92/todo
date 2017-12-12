<?php
namespace App\Repositories;


abstract class Repository 
{
    protected $model;
    
    public function paginate($pages)
    {
        return $this->model->paginate($pages);
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }
    
}