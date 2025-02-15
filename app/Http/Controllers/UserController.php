<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use LiveWire\WithPagination;


class UserController extends Controller
{
    // use WithPagination;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = $request->input('search');

        // Búsqueda por nombre o email en users
        $user = User::where('name', 'LIKE', '%' . $query . '%')->orWhere('email', 'LIKE', '%' . $query . '%');
    
        $users = $user->paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
