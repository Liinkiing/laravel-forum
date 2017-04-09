<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Thread
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Thread whereUserId($value)
 */
class Thread extends Model
{
    protected $guarded = [];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }
}
