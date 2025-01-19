<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);

    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    // Show the form for creating a new task
    return view('create');
})->name('tasks.create');

Route::post('/tasks', function (TaskRequest $request) {
    // Validate the incoming request
    $validated = $request->validated();

    $validated['completed'] = false;

    // Create a new task
    Task::create($validated);

    // Redirect to the tasks list
    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {
    $validated = $request->validated();

    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleCompleted();

    return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');
})->name('tasks.toggle-complete');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');
