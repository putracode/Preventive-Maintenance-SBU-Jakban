<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'temuans';

    public function pop(){
        return $this->belongsTo(Pop::class);
    }

}
