<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pop extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'pops';

    protected function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

    protected function improvement(){
        return $this->hasMany(Improvement::class);
    }

    protected function temuan(){
        return $this->hasMany(Temuan::class);
    }

    protected function kelistrikan(){
        return $this->hasMany(kelistrikan::class);
    }
}
