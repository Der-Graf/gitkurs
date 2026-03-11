<x-layout :title="$task->title">{{-- Übergabe eines Variablenwertes --}}
    <h1>{{ $task->title }}</h1>

    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p><strong>Fällig:</strong> 
    @isset($task->due_date)
    {{ $task->due_date->format('d.m.Y') }}
    @else
    -
    @endisset</p>
    <p><strong>Notizen:</strong><br>{{ $task->notes ?? '—' }}</p>{{-- Null coalescing Operator --}}

    <p>
        <ul style="font-size:14px;">
        @foreach($users as $user)       {{-- Warum nicht: "@foreach ($task->users as $user)" ??? Antwort: Weil es bereits im TaskController eingeladen wird --}}
            <li>{{ $user->name }} (<a href="mailto:{{ $user->email }}">{{ $user->email }}</a>)</li>  
        @endforeach
    </p>

    <p>
        <a href="/tasks">Zur Liste</a> |
        <a href="/tasks/{{ $task->id }}/edit">Bearbeiten</a>
    </p>
    
</x-layout>
