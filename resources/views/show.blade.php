
@extends('layout.app')


@section('title', $task->title)

@section('content')

    <nav class="mb-4 mt-2">
        <a 
            href="{{ route('tasks.index') }}"
            class="font-medium text-gray-700 underline decoration-purple-500"
        >
           ← Task List
        </a>
    </nav>

    @isset($task)

        <p class="mb-4 text-slate-700">{{ $task->title }}</p>
        <p class="mb-4 text-slate-700">{{ $task->description }}</p>
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
        <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} 
            • Updated {{ $task->updated_at->diffForHumans() }}</p>

        <p class="mb-4">
            @if ($task->completed)
                <span class="font-medium text-green-500">Completed</span>
                @else
                <span class="font-medium text-red-500">Not completed</span>
            @endif    
        </p>    

        <form method="post" action={{ route('tasks.toggle-complete', ['task' => $task]) }}>
            @csrf
            @method('PUT')
            <button type="submit" class="font-medium text-gray-700 underline decoration-blue-500 mb-4">
                @if($task->completed)
                    Mark uncomplete
                    @else
                    Mark complete
                @endif
            </button>
        </form>

        <div class="flex gap-4 items-center">

            <nav>
                <a 
                    href="{{ route('tasks.edit', ['task' => $task]) }}"
                    class="font-medium text-gray-700 underline decoration-purple-500"
                >
                   Edit
                </a>
            </nav>
    
            <form method="post" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="font-medium text-gray-700 underline decoration-red-500">Delete</button>
            </form>

        </div>


    @endisset

@endsection