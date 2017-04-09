<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @var Thread $thread
     */
    private $thread;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed');
        $this->thread = Thread::first();
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
}
