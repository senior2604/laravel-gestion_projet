@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Messages</h1>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Message</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="project_id">Projet</label>
            <select name="project_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <hr>
    <h2>Liste des Messages</h2>
    <ul class="list-group">
        @foreach($messages as $message)
            <li class="list-group-item">
                <strong>{{ $message->user->name }}:</strong> {{ $message->content }}
                <br>
                <small>Projet: {{ $message->project->name }}</small>
            </li>
        @endforeach
    </ul>
</div>
@endsection
