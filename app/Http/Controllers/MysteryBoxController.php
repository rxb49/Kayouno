<?php

namespace App\Http\Controllers;

use App\Models\MysteryBox;
use Illuminate\Http\Request;

class MysteryBoxController extends Controller
{
    public function getMysteryBox(Request $request) // <- remplacer ProfileUpdateRequest par Request
    {
        $mysteryBoxs = MysteryBox::all(); // récupère toutes les MysteryBox
        return view("home", ["mysteryBoxs" => $mysteryBoxs]);
    }
}
