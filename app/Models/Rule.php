<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','description'];
    protected $hidden = ['created_at', 'updated_at', 'user_id', 'id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
