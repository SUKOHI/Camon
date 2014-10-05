<?php namespace Sukohi\Camon\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Camon extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'camon'; }
 
}