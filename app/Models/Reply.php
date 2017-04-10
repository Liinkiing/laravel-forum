<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reply
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Reply whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Reply whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Reply whereThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Reply whereUserId($value)
 * @property-read \App\Models\User $author
 */
class Reply extends Model
{
    protected $guarded = [];
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
