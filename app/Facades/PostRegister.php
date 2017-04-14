<?php

namespace Claws\Facades;

use Illuminate\Support\Facades\Facade;

class PostRegister extends Facade
{
  protected static function getFacadeAccessor(){
      return 'postregister';
  }
}