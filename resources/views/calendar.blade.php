<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }
        #calendar {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .fc {
            font-size: 14px; /* Ajustez la taille de la police si nécessaire */
        }
        .fc-toolbar-title {
            font-size: 24px;
            color: #333;
        }
        .fc-daygrid-day-number {
            color: #666;
        }
        .fc-daygrid-day-top {
            background-color: #f1f1f1;
        }
        .fc-event {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
        }
        .fc-event:hover {
            background-color: #0056b3;
        }
        .fc-button-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .fc-button-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .fc-button {
            font-size: 14px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1>Calendrier</h1>
    <div id="calendar"></div>

    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',  // Vue initiale (mois)
                events: [
                    { title: 'Événement 1', start: '2024-09-10' },
                    { title: 'Événement 2', start: '2024-09-15' }
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
