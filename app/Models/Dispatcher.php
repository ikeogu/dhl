<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatcher extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','image'];

    public function items(){
        return $this->belongsTo(Item::class);
    }
}