<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Inclure les styles CSS -->
    <style>
        /* Style du tableau */
        .stat-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .stat-table th, .stat-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .stat-table thead th {
            background-color: skyblue;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 14px;
        }

        .stat-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .stat-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .stat-table tbody tr:last-of-type {
            border-bottom: 2px solid skyblue;
        }

        .stat-table tbody tr:hover {
            background-color: #f1c40f;
            color: #ffffff;
        }

        .stat-table td {
            color: #2c3e50;
            font-weight: bold;
        }

        .stat-table tbody td:nth-child(2) {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="javascript:history.go(-1)">Retour</a></li>
        </ul>
    </div>

    <main class="main-content">
        <section>
            <h2 class="section-title">Résumé des Statistiques</h2>
            <table class="stat-table">
                <thead>
                    <tr>
                        <th>Statistique</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total des Projets</td>
                        <td>{{ $totalProjects }}</td>
                    </tr>
                    <tr>
                        <td>Total des Tâches</td>
                        <td>{{ $totalTasks }}</td>
                    </tr>
                    <tr>
                        <td>Tâches Complètes</td>
                        <td>{{ $completedTasks }}</td>
                    </tr>
                    <tr>
                        <td>Projets Actifs</td>
                        <td>{{ $activeProjects }}</td>
                    </tr>
                    <tr>
                        <td>Projets Suspendus</td>
                        <td>{{ $suspendedProjects }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Votre Entreprise. Tous droits réservés.</p>
    </footer>
</body>
</html>
