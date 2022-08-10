<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'Name',
        'Address',
        'Logo',
        'Website',
        'Email',
        
    ];
    use HasFactory;
}
