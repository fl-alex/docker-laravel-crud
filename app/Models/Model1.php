<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model1 extends Model
{
    use HasFactory;

    /**
     * Get all related records from Model2
     */

    public function model2s()
    {
        return $this->hasMany(Model2::class);
    }

}
