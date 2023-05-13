<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelistrikan extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'kelistrikan';

    protected function pop(){
        return $this->belongsTo(pop::class);
    }
}
