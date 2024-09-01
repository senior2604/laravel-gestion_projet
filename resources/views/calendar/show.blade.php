<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier Annuel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .month-title {
            font-size: 1.5em;
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @foreach ($months as $monthNumber => $month)
        <div class="month">
            <div class="month-title">{{ $month['name'] }}</div>
            <table>
                <thead>
                    <tr>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($week = 0; $week < 6; $week++)
                        <tr>
                            @foreach (range(0, 6) as $dayOfWeek)
                                <td>
                                    @isset($month['days'][$dayOfWeek])
                                        @foreach ($month['days'][$dayOfWeek] as $date)
                                            {{ \Carbon\Carbon::parse($date)->format('j') }}<br>
                                        @endforeach
                                    @endisset
                                </td>
                            @endforeach
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
