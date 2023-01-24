<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Improvement extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'improvements';

    public function pop(){
        return $this->belongsTo(Pop::class);
    }
}
