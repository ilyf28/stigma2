<?php
namespace Stigma\ObjectManager\Repositories;
use Stigma\Database\Repository\IlluminateRepository;

class GlusterfsVolumeRepository extends IlluminateRepository
{
    protected $model = 'Stigma\ObjectManager\Models\GlusterfsVolume';
}
