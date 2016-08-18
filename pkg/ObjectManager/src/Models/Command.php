<?php
namespace Stigma\ObjectManager\Models;

class Command extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = ['command_name','command_line'];
}
