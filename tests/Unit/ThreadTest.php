<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function test_thread_has_replies() {
        factory(User::class)->create();
        $thread = factory(Thread::class)->create();
        factory(Reply::class, 3)->create(['thread_id' => $thread->id]);
        $this->assertCount(3, $thread->replies);
    }
}
