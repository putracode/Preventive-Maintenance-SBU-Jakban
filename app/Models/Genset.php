<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genset extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'genset';

    protected function pop(){
        return $this->belongsTo(pop::class);
    }
}
