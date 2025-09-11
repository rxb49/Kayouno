<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MysteryBox extends Model
{
    use HasFactory;
    // 1) Nom réel de la table
    protected $table = 'MysteryBox';
    // 4) Colonnes modifiables en masse
    protected $fillable = [
        'nom',
        'prix',
        'image',
        'is_popular',
        'is_danger'
    ];
    // 5) Casts (formatage/typage automatiques)
    protected $casts = ['prix' => 'decimal:2'];

    // 3) Si ta table n’a PAS created_at / updated_at, désactive
    public $timestamps = false;

    // 6) Relations
    // Une MysteryBox possède plusieurs Cailloux (FK 'idBox' dans cailloux)
    public function cailloux()
    {
        return $this->hasMany(Cailloux::class, 'idBox', 'id');
    }
}
