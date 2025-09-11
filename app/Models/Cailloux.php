<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cailloux extends Model
{
    protected $table = 'Cailloux';
    public $timestamps = false;
    protected $fillable = ['nom', 'idBox', 'idRarete'];

    public function box()
    {
        return $this->belongsTo(MysteryBox::class, 'idBox', 'id');
    }

    public function rarete()
    {
        return $this->belongsTo(Rarete::class, 'idRarete', 'id');
    }
}
