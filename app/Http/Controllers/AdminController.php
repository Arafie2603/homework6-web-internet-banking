<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
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
        request()->validate([
            'password_confirmation' => 'same:password_baru',
        ]);

        $user = User::findorfail($id);
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password_baru) {
            $user->password = bcrypt($request->password_baru);
        }

        $user->save();
        return back()->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id','=',$id)->firstOrFail();
        $user->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }
}
