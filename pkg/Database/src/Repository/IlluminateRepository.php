<?php 
namespace Stigma\Database\Repository;

use Stigma\Database\Repository\Contracts\RepositoryInterface ;
use Stigma\Database\Repository\Contracts\ModelFactoryInterface ;

class IlluminateRepository implements RepositoryInterface
{ 
    protected $model ;
    protected $modelFactory ;
    protected $limit = 20 ;
    protected $page = 1 ;

    public function __construct(ModelFactoryInterface $modelFactory)
    {
        $this->modelFactory = $modelFactory ;
    }

    public function find($id)
    {
        $model = $this->modelFactory->create($this->model) ;
        return $model->newQuery()->find($id) ; 
    }

    public function delete($ids)
    {
        $item = $this->find($ids) ;
        $item->delete() ; 
        return $item ;
    }

    public function store(array $data)
    {
        $model = $this->modelFactory->create($this->model) ;
        $model->fill($data)->save() ;

        return $model ;
    }

    public function update($id,array $data)
    {
        $item = $this->find($id) ;
        $item->fill($data) ;
        $item->save() ;

        return $item ;
    }

    public function getAll()
    {
        $model = $this->modelFactory->create($this->model) ;
        return $model->all() ;
    }

    public function findBy($column, $value , $operator = '=')
    {
        $model = $this->modelFactory->create($this->model) ;
        return $model->newQuery()->where($column,$operator,$value)->get() ;
    }

    public function setModel($model)
    {
        $this->model = $model ;
    } 
}
