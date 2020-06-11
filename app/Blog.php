<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'title', 'image', 'content','slug'
    ];


    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}
