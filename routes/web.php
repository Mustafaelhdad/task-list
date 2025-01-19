<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->get();;

    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    // Show the form for creating a new task
    return view('create');
})->name('tasks.create');

Route::post('/tasks', function (Request $request) {
    // Validate the incoming request
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'long_description' => 'nullable|string',
    ]);

    $validated['completed'] = false;

    // Create a new task
    Task::create($validated);

    // Redirect to the tasks list
    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('/tasks/{id}/edit', function ($id) {
    // Retrieve the task by ID
    $task = Task::findOrFail($id);

    // Pass the task to the edit view
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('/tasks/{id}', function (Request $request, $id) {
    // Validate the request
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'long_description' => 'nullable|string',
    ]);

    // Find the task and update it
    $task = Task::findOrFail($id);
    $task->update($validated);

    // Redirect back to the tasks list with a success message
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::get('/tasks/{id}', function ($id) {
    // Find the task with the matching ID
    $task = Task::findOrFail($id);

    // Pass the task to a view
    return view('show', ['task' => $task]);
})->name('tasks.show');
