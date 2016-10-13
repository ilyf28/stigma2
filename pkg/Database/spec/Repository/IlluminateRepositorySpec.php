<?php 
namespace spec\Stigma\Database\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Stigma\Database\Repository\DummyModel;
use Stigma\Database\Repository\Contracts\ModelFactoryInterface ;
use Illuminate\Database\Eloquent\Builder ;
use Illuminate\Database\Eloquent\Collection ;
use Illuminate\Contracts\Pagination\Paginator ;

class IlluminateRepositorySpec extends ObjectBehavior
{

    protected $dummyModelInstance ;
    protected $dummyModelName ;

    function it_is_initializable()
    {
        $this->shouldHaveType('Stigma\Database\Repository\IlluminateRepository');
        $this->shouldImplement('Stigma\Database\Repository\Contracts\RepositoryInterface');
    }

    public function let(ModelFactoryInterface $modelFactory)
    {
        $this->dummyModelInstance = new \Stigma\Database\Repository\DummyModel ;
        $this->beConstructedWith($modelFactory) ;
        $this->dummyModelName = get_class($this->dummyModelInstance) ;
        $this->setModel($this->dummyModelName) ;
    }

    public function it_finds_item(DummyModel $model, ModelFactoryInterface $modelFactory ,Builder $builder)
    {
        $id = 1; 

        $modelFactory->create($this->dummyModelName)->shouldBeCalled()->willReturn($model) ;
        $model->newQuery()->shouldBeCalled()->willReturn($builder);
        $builder->find($id)->shouldBeCalled()->willReturn($this->dummyModelInstance) ;

        $this->find($id)->shouldBeAnInstanceOf(get_class($this->dummyModelInstance))  ;
    }

    public function it_stores_item(ModelFactoryInterface $modelFactory,DummyModel $model)
    {
        $data = array() ;

        $modelFactory->create($this->dummyModelName)->shouldBeCalled()->willReturn($model) ;
        $model->fill($data)->willReturn($model) ;
        $model->save()->shouldBeCalled()->willReturn($this->dummyModelInstance) ;

        $this->store($data)->shouldBeAnInstanceOf(get_class($this->dummyModelInstance));
    } 

    public function it_deletes_item(ModelFactoryInterface $modelFactory, DummyModel $model, Builder $builder)
    {
        $id = 1 ; 

        $modelFactory->create($this->dummyModelName)->shouldBeCalled()->willReturn($model) ;
        $model->newQuery()->shouldBeCalled()->willReturn($builder);
        $builder->find($id)->shouldBeCalled()->willReturn($model) ;

        $model->delete()->shouldBeCalled() ;

        $this->delete($id)->shouldBeAnInstanceOf(get_class($this->dummyModelInstance)) ;
    }

    public function it_updates_item(ModelFactoryInterface $modelFactory, DummyModel $model, Builder $builder)
    {
        $id = 1 ; 
        $data = array() ; 

        $modelFactory->create($this->dummyModelName)->shouldBeCalled()->willReturn($model) ;
        $model->newQuery()->shouldBeCalled()->willReturn($builder);
        $builder->find($id)->shouldBeCalled()->willReturn($model) ;
        $model->fill($data)->shouldBeCalled() ;
        $model->save()->shouldBeCalled() ;

        $this->update($id,$data)->shouldBeAnInstanceOf(get_class($this->dummyModelInstance)) ; 
    }

    public function it_findBy_item(ModelFactoryInterface $modelFactory, DummyModel $model,Builder $builder, Collection $collection)
    {
        $column = 'column' ; 
        $value = 'dummy_value' ;
        $operator = '=' ;

        $modelFactory->create($this->dummyModelName)->shouldBeCalled()->willReturn($model) ;
        $model->newQuery()->shouldBeCalled()->willReturn($builder);
        $builder->where($column,$operator,$value)->shouldBeCalled()->willReturn($builder) ;
        $builder->get()->shouldBeCalled()->willReturn($collection) ;

        $this->findBy($column,$value)->shouldBeAnInstanceOf('\Illuminate\Database\Eloquent\Collection') ;
    }

    public function it_paginate()
    {
    } 
}

namespace Stigma\Database\Repository ;
class DummyModel extends \Illuminate\Database\Eloquent\Model 
{
}
