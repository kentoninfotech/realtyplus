<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    public function business()
    {
        return $this->belongsTo(businesses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
