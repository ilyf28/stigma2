<?php
namespace Stigma\CommandBuilder\Models ;

class Command extends \Eloquent
{
    protected $guarded = [] ;
    protected $fillable = ['command_name','command_line'] ;

}
