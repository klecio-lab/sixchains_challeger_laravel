<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller
{
    // Lista as tarefas do usuário autenticado
    public function index()
    {
        $tasks = Auth::user()->task()->orderBy('id', 'asc')->get();
        return response()->json([
            'success' => true,
            'data' => $tasks
        ], 200);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'task não encontrada'], 404);
        }

        if ($task->user_id !== auth()->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json(['data' => $task], 200);
    }

    // Cria uma nova tarefa
    public function store(CreateTaskRequest $request)
    {
        $task = auth()->user()->task()->createMany([
            $request->validated()
        ]);

        if(isset($task->id)){
            return response()->json(['success' => false], 500);
        }

        return response()->json(['success' => true], 201); // Retorna a tarefa criada
    }

    // Atualiza a tarefa existente
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);

        // Verifica se a tarefa pertence ao usuário autenticado
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->update($request->validated());

        return response()->json($task);
    }

    // Exclui uma tarefa
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Verifica se a tarefa pertence ao usuário autenticado
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
