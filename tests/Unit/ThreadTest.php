<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

    }

    /**
     * @test
     */
    public function it_should_have_replies() {
        $thread = factory(Thread::class)->create();
        factory(User::class)->create();
        factory(Reply::class, 3)->create(['thread_id' => $thread->id]);
        $this->assertCount(3, $thread->replies);
    }

    /**
     * @test
     */
    public function user_should_post_reply() {
        $thread = factory(Thread::class)->create();
        $user = factory(User::class)->create();
        $this->be($user);
        $reply = factory(Reply::class)->make([
            'user_id' => $user->id,
            'thread_id' => $thread->id
        ]);
        $this->post(route('replies.store', $thread), $reply->toArray());
        $this->assertCount(1, $thread->replies);
    }

    /**
     * @test
     */
    public function unauthenticated_user_should_not_post_reply() {
        $this->expectException(AuthenticationException::class);

        $thread = factory(Thread::class)->create();
        $user = factory(User::class)->create();
        $reply = factory(Reply::class)->make([
            'user_id' => $user->id,
            'thread_id' => $thread->id
        ]);
        $this->post(route('replies.store', $thread), $reply->toArray());
    }

}
