<!DOCTYPE html>
<html>
<head>
    <title>Créer un Rapport</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Créer un Rapport</h1>
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titre du Rapport</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu du Rapport</label>
                <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer le Rapport</button>
        </form>
    </div>
</body>
</html>
