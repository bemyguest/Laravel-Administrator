<?php

namespace Frozennode\Administrator\Tests\Config\Model;

class EloquentStub extends \Illuminate\Database\Eloquent\Model
{
    public $exists = true;
    public $field1 = 'foo';
    public static $rules = array('foo');

    public function getTable()
    {
        return 'table';
    }

    public function find()
    {
        return $this;
    }

    public function __unset($name)
    {
        unset($this->$name);
    }
}