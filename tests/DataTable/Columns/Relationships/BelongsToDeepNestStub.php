<?php

namespace Frozennode\Administrator\Tests\DataTable\Columns\Relationships;

use Mockery as m;

class BelongsToDeepNestStub
{
    public function btdeepnest()
    {
        $mock = m::mock('Illuminate\\Database\\Eloquent\\Relations\\BelongsTo');
        $mock->shouldReceive('getRelated')->zeroOrMoreTimes()->andReturn(new BelongsToDeepNestStub);
        return $mock;
    }
}