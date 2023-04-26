<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public const SHORT_URL_LENGTH = 6;

    protected $fillable = [
        'original',
        'short',
        'total_visits'
    ];
}
