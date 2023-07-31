<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'company_id' ,'[_token]'];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
