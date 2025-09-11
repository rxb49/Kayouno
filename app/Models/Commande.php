<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'Commande';
    public $timestamps = false;
    protected $fillable = ['id', 'idBox', 'idUser'];

    public function box()
    {
        return $this->belongsTo(MysteryBox::class, 'idBox', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
