<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battere extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'battere';

    protected function pop(){
        return $this->belongsTo(pop::class);
    }
}
