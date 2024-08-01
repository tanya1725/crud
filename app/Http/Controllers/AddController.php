<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::all();
        return view("deleteuser",["users"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     */
     Function store(Request $req)
    {
        //
        $validatedData = $req->validate([
            'password' => 'required|min:8',
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password); 
        $user->save();
        session()->flash('success', 'Data saved successfully.');
        return redirect('add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function edit($id)
    {
        //
        $data=User::find($id);
       
         return view('edit',['data'=>$data]);
        
  
       // return redirect('updateuser');
    }

    /**
     * Update the specified resource in storage.
     *

     */
    function update(Request $req)
    {
        $data=User::find($req->id);
        $validatedData = $req->validate([
            'password' => 'required|min:8',
        ]);
        $data=User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->password); 
        $data->save();
        
        session()->flash('success', 'Data update successfully.');

        return redirect('deleteuser');
        
    }

    /**
     * Remove the specified resource from storage.
     *

     */
     function delete($id)
    {
        
        $data= User::find($id);
        $data->delete();
        session()->flash('success', 'Data delete successfully.');
        return redirect('deleteuser');

    }
}
