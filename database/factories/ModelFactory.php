<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Thread;
use App\Models\User;

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Thread::class, function(Faker\Generator $faker) {
    return [
       'title' => $faker->sentence,
       'user_id' => function() {
           $user_ids = User::pluck('id');
           if($user_ids->isEmpty()) return 1;
           return $user_ids[random_int(0, (count($user_ids) - 1))];
       },
       'body' => $faker->text
   ];
});


$factory->define(\App\Models\Reply::class, function(Faker\Generator $faker) {
    return [
        'body' => $faker->text,
        'user_id' => function() {
            $user_ids = User::pluck('id');
            if($user_ids->isEmpty()) return 1;
            return $user_ids[random_int(0, (count($user_ids) - 1))];
        },
        'thread_id' => function() {
            $threads_id = Thread::pluck('id');
            if($threads_id->isEmpty()) return 1;
            return $threads_id[random_int(0, (count($threads_id) - 1))];
        }
    ];
});
