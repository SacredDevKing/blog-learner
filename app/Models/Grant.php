<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grant extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'short_content',
        'content',
        'image',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
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
