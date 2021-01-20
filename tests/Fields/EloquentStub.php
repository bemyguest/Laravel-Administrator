<?php

namespace Frozennode\Administrator\Tests\Fields;

use Mockery as m;

class EloquentStub
{
    public $books;
    public $other = 'other_value';
    public $default_value = 'something';

    public function __construct()
    {
        $this->books = m::mock('Illuminate\Database\Eloquent\Collection');
        $this->books->shouldReceive('toArray')->zeroOrMoreTimes()->andReturn('books_value');
    }

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

    public function bar()
    {
        return 'not a relationship';
    }
}