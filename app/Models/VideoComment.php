<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoComment extends Model
{

    use SoftDeletes, Scope;

    protected $table = 'video_comments';

    protected $fillable = [
        'user_id', 'video_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }

    public function getContent()
    {
        return (new \Parsedown)->text($this->content);
    }

}
