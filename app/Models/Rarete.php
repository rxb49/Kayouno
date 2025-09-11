<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarete extends Model
{
    protected $table = 'Rarete';
    public $timestamps = false;
    
    protected $fillable = ['nomRarete, chance'];

    public function cailloux()
    {
        return $this->hasMany(Cailloux::class, 'idRarete', 'ID');
    }
}
