<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function generateReport()
    {
        // Exemple de données pour le rapport
        $data = [
            'title' => 'Rapport de Projet',
            'content' => 'Voici le contenu du rapport.',
        ];

        // Générer le PDF à partir de la vue Blade
        $pdf = PDF::loadView('reports.pdf', $data);

        // Télécharger le PDF
        return $pdf->download('rapport.pdf');
    }
}
