<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = ['user_name', 'phone_number', 'email'];
    
    // タイムスタンプなしでも処理可能
    // public $timestamps = false;

    /**
     *  タスクを保持するユーザーの習得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
