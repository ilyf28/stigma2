<?php
namespace Stigma\ObjectManager\Repositories;
use Stigma\Database\Repository\IlluminateRepository;

class CommandRepository extends IlluminateRepository
{
    protected $model = 'Stigma\ObjectManager\Models\Command';
    protected $fillable = ['command_name','command_line'];
}
