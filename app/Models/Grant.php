<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grant extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = false;


    protected $fillable = [
        'title',
        'short_content',
        'content',
        'image',
        'start_grant',
        'end_grant',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,
            'favourite_user_grant_notifications',
            'grant_id',
            'user_id', 'is_notification');
    }

}
