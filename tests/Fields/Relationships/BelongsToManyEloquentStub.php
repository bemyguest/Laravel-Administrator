<?php

namespace Frozennode\Administrator\Tests\Fields\Relationships;

use Mockery as m;

class BelongsToManyEloquentStub
{
    public $fieldSort = '3,4,5';
    public $fieldNoSort = '3,4,5';

    public function fieldSort()
    {
        $relationship = m::mock('Illuminate\Database\Eloquent\Relations\BelongsToMany');
        $relationship->shouldReceive('detach')->once()
            ->shouldReceive('attach')->times(3);
        return $relationship;
    }

    public function fieldNoSort()
    {
        $relationship = m::mock('Illuminate\Database\Eloquent\Relations\BelongsToMany');
        $relationship->shouldReceive('sync')->once();
        return $relationship;
    }

    public function __unset($rel)
    {
        unset($this->{$rel});
    }
}