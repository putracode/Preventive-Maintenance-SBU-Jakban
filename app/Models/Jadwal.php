<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Pop;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'jadwals';

    public function pop(){
        return $this->belongsTo(Pop::class);
    }


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->id = (string) Str::uuid();
    //     });
    // }

    // public static function create(array $attributes = [])
    // {
    //     if($attributes['jenis_pm'] == 'ISP'){
    //         $attributes['jadwal_id'] = 'ISP/' . date('Y') . '/' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
    //     }elseif($attributes['jenis_pm'] == 'OSP'){
    //         $attributes['jadwal_id'] = 'OSP/' . date('Y') . '/' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
    //     }
    //     // $attributes['id'] = date('Ymd') . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
    //     return static::query()->create($attributes);
    // }
}
