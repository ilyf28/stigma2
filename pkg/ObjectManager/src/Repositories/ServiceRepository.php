<?php
namespace Stigma\ObjectManager\Repositories;
use Stigma\Database\Repository\IlluminateRepository;

class ServiceRepository extends IlluminateRepository
{
    protected $model = 'Stigma\ObjectManager\Models\Service';
}
