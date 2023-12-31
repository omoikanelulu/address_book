<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'country',
        'type',
        'postal_code',
        'state',
        'city',
        'street_address',
    ];

    // このモデルはPersonモデルを主としている
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
