<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitar extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model_name',
        'description',
        'color',
        'price',
        'fingerboard',
        'manufacturer_id',
        'body_type_id'
    ];


    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    
    public function body_type()
    {
        return $this->belongsTo(BodyType::class);
    }



}
