

@section('title', isset($task) ? 'Edit task' : 'Create new task')

@section('content')

    <nav class="mb-4 mt-2">
        <a 
            href="{{ route('tasks.index') }}"
            class="font-medium text-gray-700 underline decoration-purple-500"
        >
        ← Task List
        </a>
    </nav>

    <form 
        method="post" 
        action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
    >
        
        @csrf

        @isset($task)
            @method('PUT')
        @endisset

        <div class="title flex flex-col justify-center gap-2 my-2 mb-4" id="title" name="title">
            <label for="title">Title</label>
            <input 
                type="text" 
                id="title" 
                class="px-4 
                py-2 
                border 
                border-gray-300 
                rounded-lg 
                focus:outline-none 
                focus:ring-2 
                focus:ring-purple-500 
                focus:border-transparent" 
                placeholder="title" 
                name="title" 
                value="{{ $task->title ?? old('title') }}"
            >
            @error('title') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="description flex flex-col justify-center gap-2 my-2 mb-4" id="description" name="description">
            <label for="description">Description</label>
            <textarea 
                id="description" 
                placeholder="description" 
                rows="5" 
                name="description"
                class="px-4 
                py-2 
                border 
                border-gray-300 
                rounded-lg 
                focus:outline-none 
                focus:ring-2 
                focus:ring-purple-500 
                focus:border-transparent">{{ $task->description ?? old('description') }}</textarea>
            @error('description') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="long-description flex flex-col justify-center gap-2 my-2 mb-4" id="long_description" name="long_description">
            <label for="long_description">Long Description</label>
            <textarea 
                id="long_description" 
                placeholder="Long description" 
                rows="10" 
                name="long_description"
                class="px-4 
                py-2 
                border 
                border-gray-300 
                rounded-lg 
                focus:outline-none 
                focus:ring-2 
                focus:ring-purple-500 
                focus:border-transparent">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="font-medium text-gray-700 underline decoration-purple-500">
                @isset($task)
                    Edit Task
                    @else 
                    Create Task
                @endisset
            </button>
        </div>

    </form>

@endsection