<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model2 extends Model
{
    use HasFactory;

    /**
     * Get parent record from Model1
     */

    public function model1()
    {
        return $this->belongsTo(Model1::class);
    }
}
