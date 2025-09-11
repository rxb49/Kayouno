<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        $boxId = $request->get('box', '1');
        
        // Définir les informations des boxes
        $boxes = [
            '1' => ['name' => 'Mystery Box #1', 'price' => '10'],
            '2' => ['name' => 'Mystery Box #2', 'price' => '800'],
            '3' => ['name' => 'Mystery Box #3', 'price' => '1 000 560'],
        ];
        
        $boxInfo = $boxes[$boxId] ?? $boxes['1'];
        
        return view('payment', [
            'boxId' => $boxId,
            'boxName' => $boxInfo['name'],
            'boxPrice' => $boxInfo['price']
        ]);
    }
    
    public function process(Request $request)
    {
        // Validation des données (fictive)
        $request->validate([
            'box_id' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);
        
        // Simulation du traitement de paiement
        // Dans un vrai système, ici on appellerait l'API de paiement
        
        // Définir les informations des boxes
        $boxes = [
            '1' => ['name' => 'Mystery Box #1', 'price' => '10'],
            '2' => ['name' => 'Mystery Box #2', 'price' => '800'],
            '3' => ['name' => 'Mystery Box #3', 'price' => '1 000 560'],
        ];
        
        $boxInfo = $boxes[$request->box_id] ?? $boxes['1'];
        
        // Simuler un délai de traitement
        sleep(1);
        
        // Rediriger vers la page de succès
        return view('payment-success', [
            'boxName' => $boxInfo['name'],
            'amount' => $boxInfo['price']
        ]);
    }
}
