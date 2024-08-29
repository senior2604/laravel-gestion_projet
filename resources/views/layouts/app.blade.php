@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Projets Totaux</h5>
                    <p class="card-text">Gérez vos projets en cours et terminés.</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-light">Voir les Projets</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Vue d'Ensemble des Tâches</h5>
                    <p class="card-text">Suivez vos tâches et voyez leur statut.</p>
                    <a href="{{ route('tasks.index') }}" class="btn btn-light">Voir les Tâches</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Statistiques</h5>
                    <p class="card-text">Consultez les statistiques de vos projets et tâches.</p>
                    <a href="{{ route('statistics.index') }}" class="btn btn-light">Voir les Statistiques</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
