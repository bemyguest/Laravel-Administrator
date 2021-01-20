<?php

namespace Frozennode\Administrator\Tests\DataTable\Columns\Relationships;

use Mockery as m;

class BelongsToNestStub
{
    public function btnest()
    {
        $mock = m::mock('Illuminate\\Database\\Eloquent\\Relations\\BelongsTo');
        $mock->shouldReceive('getRelated')->zeroOrMoreTimes()->andReturn(new BelongsToDeepNestStub);
        return $mock;
    }
}