<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'category',
        'status',
        'user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    
}
