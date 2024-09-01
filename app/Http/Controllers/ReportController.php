<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    // Afficher le formulaire de création
    public function create()
    {
        return view('reports.create');
    }

    // Traiter la soumission du formulaire et générer le PDF
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Charger la vue à convertir en PDF
        $pdf = PDF::loadView('reports.report', $validatedData);

        // Télécharger le PDF
        return $pdf->download('rapport.pdf');
    }
}
