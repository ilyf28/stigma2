<?php
namespace Stigma\ObjectManager\Models;

class GlusterfsVolume extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'cluster_id',
        'volume_name',
        'type',
        'bricks'
    ];
}
