<?php
namespace Stigma\ObjectManager\Models;

class GlusterfsCluster extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'cluster_name',
        'alias',
        'member'
    ];
}
