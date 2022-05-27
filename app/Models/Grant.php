<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grant extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $hidden = [
      'short_content',
      'content',
      'deleted_at',
    ];

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
            'user_grants',
            'grant_id',
            'user_id')
            ->withPivot('is_notification');
    }

}
