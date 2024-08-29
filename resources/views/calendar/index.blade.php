<!DOCTYPE html>
<html>
<head>
    <title>Calendrier</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Inclure les styles CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.0.0/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.0.0/main.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Calendrier</h1>
        <nav>
            <a href="{{ route('dashboard') }}">Tableau de Bord</a>
            <!-- Ajouter d'autres liens de navigation si nécessaire -->
        </nav>
    </header>

    <main>
        <div id="calendar"></div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Votre Entreprise. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.0.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.0.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.0.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction'],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                events: '/fetch-events',
                editable: true,
                droppable: true
            });
            calendar.render();
        });
    </script>
</body>
</html>
