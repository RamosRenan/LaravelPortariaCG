<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitantes extends Model
{
    //
    protected $connection = 'pgsql';

    protected $fillable = ['id', 'tel', 'cracha', 'recepcao', 'name', 'rg', 'localdestino', 'responsavel', 'status', 'period_into', 'time_out', 'path_picture', 'date_in', 'path_picture', 'date_out', 'obs'];

    public function note()
    {
        // return $this->hasMany('App\Models\LegalAdvice', 'note');
    }
}