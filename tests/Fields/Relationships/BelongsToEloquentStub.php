<?php

namespace Frozennode\Administrator\Tests\Fields\Relationships;

class BelongsToEloquentStub
{
    public $rel;

    public function __unset($rel)
    {
        unset($this->{$rel});
    }
}