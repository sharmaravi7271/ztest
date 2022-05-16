<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Election extends Model
{
    use HasFactory;
     protected $fillable = [
        'full_name','phone_number','email','member_id','user_id','status','is_verified',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'foreign_key');
}




}
