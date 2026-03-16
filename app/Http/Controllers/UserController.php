<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $users = User::all();
    return view('users', ['users' => $users]);
    }

    public function upload(Request $request, string $id)
    {
        $user = User::findOrFail($id);
    
        if ($request->hasFile('image')) 
            {
            $filename = $user->id . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('users', $filename, 'public');
            $user->imagepath = $imagePath;
            $user->save();
            }
    
        return redirect()->back()->with('success', 'Bild hochgeladen!');
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
