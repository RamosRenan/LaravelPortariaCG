<?php

namespace App\Models\LegalAdvice;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $connection = 'legaladvice';

    protected $fillable = ['name', 'order'];
}
