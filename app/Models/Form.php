<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    
    //Zdefiniowanie relacji jeden do jeden z użytkownikeim
    public function user(){
        return $this->belongsTo(User::class);
    }
}
