<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_have_author()
    {
        /** @var Reply $reply */
        factory(User::class)->create();
        $reply = factory(Reply::class)->create();
        $this->assertInstanceOf(User::class, $reply->author);
    }
}
