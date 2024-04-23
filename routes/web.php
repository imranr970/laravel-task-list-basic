<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(8);
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::post('/tasks/store', function(TaskRequest $request) {

    $data = $request->validated();

    $task = Task::create($data);

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('tasks.store');

Route::get('/tasks/edit/{task}', function(Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::put('/tasks/update/{task}', function(TaskRequest $request, Task $task) {

    $data = $request->validated();

    $task->update($data);

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');


})->name('tasks.update');

Route::get('/tasks/{task}', function ($task) {
    // $task_index = array_search($task, array_column($tasks, 'id'));
    // $task = collect($tasks)->firstWhere('id', $task);
    // if(!$task) 
    // {
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    $task = Task::findOrFail($task);
    return view('show', [
        'task' => $task
        // 'task' => $tasks[$task_index]
    ]);
})->name('tasks.show');

Route::delete('/tasks/{task}', function(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');


Route::put('/tasks/toggle-complete/{task}', function(Task $task) {
    $task->toggleComplete();
    return back()
        ->with('success', 'Task updated');
})->name('tasks.toggle-complete');

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::fallback(function() {
    return "No view found for this route";
});