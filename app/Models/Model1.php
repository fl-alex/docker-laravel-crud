<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model1 extends Model
{
    use HasFactory;

    protected $table = 'model1';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'description' => '',
    ];


    /**
     * Get all related records from Model2
     */

    public function model2s()
    {
        return $this->hasMany(Model2::class);
    }

}
