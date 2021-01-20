<?php

namespace Frozennode\Administrator\Tests\DataTable\Columns\Relationships;

use Mockery as m;

class BelongsToStub
{
    public function bt()
    {
        $mock = m::mock('Illuminate\\Database\\Eloquent\\Relations\\BelongsTo');
        $mock->shouldReceive('getRelated')->zeroOrMoreTimes()->andReturn(new BelongsToNestStub);
        return $mock;
    }
}