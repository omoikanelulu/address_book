<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'birth_date',
    ];

    // このモデルはAddressモデルを複数従えている
    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
