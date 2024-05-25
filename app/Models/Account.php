<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "user_id",
        "title"
    ];


    protected $with = ["user"];

    protected $casts = ["user_id" => "int"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
