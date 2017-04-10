<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @var Thread $thread
     */
    private $thread;

    /**
     * @var User $user
     */
    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed');
        $this->thread = Thread::first();
        $this->user = User::first();
    }

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function test_user_can_browse_threads()
    {
        $response = $this->get(route('threads.index'));
        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function test_thread_have_title()
    {
        $response = $this->get(route('threads.index'));
        $response->assertSee($this->thread->title);
    }

    /**
     * @return void
     * @test
     */
    public function test_thread_have_body()
    {
        $response = $this->get(route('threads.index'));
        $response->assertSee($this->thread->body);
    }

    /**
     * @test
     */
    public function user_can_post_reply() {
        $this->be($this->user);
        $reply = factory(Reply::class)->make([
            'user_id' => $this->user->id,
            'thread_id' => $this->thread->id
        ]);
        $this->post(route('replies.store', $this->thread), $reply->toArray());
        $this->get(route('threads.show', $this->thread))
            ->assertSee($reply->body);
    }

    /**
     * @test
     */
    public function guest_cant_post_reply() {
        $this->expectException(AuthenticationException::class);
        $reply = factory(Reply::class)->make([
            'user_id' => $this->user->id,
            'thread_id' => $this->thread->id
        ]);
        $this->post(route('replies.store', $this->thread), $reply->toArray());
    }
}
