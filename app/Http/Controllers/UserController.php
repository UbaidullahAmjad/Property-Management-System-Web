<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type','client')->paginate(8);
        return view('pms.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pms.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'cnic' => 'required|size:13',
            'phone' => 'required|size:11',
        ]);
         $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);
           $user = new User();
           $new_user=  $user->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make('123456789'),
            'cnic'=>$request->cnic,
            'phone'=> $request->phone,
            'type' => 'client',
        ]);

        // Plot::where('id',$request->id)->update([
        //     'client_id'=>$new_user->id
        // ]);
      

        return  redirect()->route('user.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return back();
    }

    public function editing(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        
        return response()->json($user);

    }

    public function updated(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cnic' => 'required|min:10',
            'phone' => 'required',
        ]);
        $user = User::where('id',$request->id)->first();
        $user->name=$request->name;
        $user->email =$request->email;
        $user->password = Hash::make('123456789');
        $user->cnic = $request->cnic;
        $user->phone = $request->phone;
        $user->type= 'client';
         $user->update();
         return redirect()->route('user.index');

    }
}
