<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'number_of_strings',
        'is_electric',
        'orientation',
        'scale_length'
    ];

    // public function guitars()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
