<?php

namespace App\Libraries;

class DataTable 
{
protected $model;
  function _construct($model)
{
$this->model = $model;
}

public function get() {}
public function asJSON() {}
public function as html(){}



}