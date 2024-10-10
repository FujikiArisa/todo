<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use GMP;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new JsonResponse([
            'todos' => $request->user()->todos,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->content = $request->input("content");
        $request->user()->todos()->save($todo);

        return new JsonResponse([
            'todos' => $request->user()->todos,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        Gate::authorize('update', $todo);

        $todo->content = $request->input("content");
        $todo->save();

        return new JsonResponse([
            'todos' => $request->user()->todos,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Todo $todo)
    {
        Gate::authorize('delete', $todo);

        $todo->delete();

        return new JsonResponse([
            'todos' => $request->user()->todos,
        ], Response::HTTP_OK);
    }

    public function completed(Request $request, Todo $todo)
    {
        Gate::authorize('update', $todo);


        $todo->completed = !$todo->completed;
        $todo->save();

        return new JsonResponse([
            'todos' => $request->user()->todos,
        ], Response::HTTP_OK);
    }
}