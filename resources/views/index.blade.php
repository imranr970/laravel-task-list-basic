
@extends('layout.app')

@section('title', 'Task List')

@section('content')

    <nav class="mb-4 mt-2">
        <a 
            href="{{ route('tasks.create') }}"
            class="font-medium text-gray-700 underline decoration-purple-500"
        >
            Add Task
        </a>
    </nav>

    @forelse($tasks as $task)
        <div>
            <a 
                href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['line-through' => $task->completed])
            >
                {{ $task->title }}
            </a>
        </div>
        
        @empty
            No task found!
    @endforelse

    @if ($tasks->count())
        <div class="my-4">
            <nav>{{ $tasks->links() }}</nav>
        </div>
    @endif

@endsection