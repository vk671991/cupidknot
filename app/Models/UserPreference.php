<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model {

    use HasFactory;

    protected $table = 'user_preference';
    protected $fillable = [
        'expected_annual_income_from', 'expected_annual_income_to',
        'occupation', 'famiy_type', 'manglik', 'password'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
