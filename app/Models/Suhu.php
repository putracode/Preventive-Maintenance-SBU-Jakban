<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'suhu';

    protected function pop(){
        return $this->belongsTo(pop::class);
    }
}
