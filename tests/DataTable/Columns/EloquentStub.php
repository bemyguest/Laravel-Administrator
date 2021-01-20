<?php

namespace Frozennode\Administrator\Tests\DataTable\Columns;

use Mockery as m;

class EloquentStub
{
    public function bt()
    {
        return m::mock('Illuminate\Database\Eloquent\Relations\BelongsTo');
    }

    public function btm()
    {
        return m::mock('Illuminate\Database\Eloquent\Relations\BelongsToMany');
    }

    public function hm()
    {
        return m::mock('Illuminate\Database\Eloquent\Relations\HasMany');
    }

    public function ho()
    {
        return m::mock('Illuminate\Database\Eloquent\Relations\HasOne');
    }
}