<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recti extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'recti';

    protected function pop(){
        return $this->belongsTo(pop::class);
    }
}
