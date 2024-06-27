<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->phone =  Crypt::encrypt($request->phone);
        $user->cpf =  Crypt::encrypt($request->cpf);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        Auth::guard('web')->attempt($credentials);


        return redirect()->route('site.profile');
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
        //
    }

    public function storeAdress(Request $request)
    {
        $request->validate([
            'state'=> 'required',
            'city'=> 'required',
            'street'=> 'required',
            'district'=> 'required'
        ]);

        $user = User::find(Auth::guard('web')->id());

        $user->state = $request->state;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->district = $request->district;

        $user->save();

        Auth::guard('web')->setUser($user);

        return redirect()->route('site.profile');
    }

    public function showDemands()
    {
        $user = User::where('id',Auth::guard('web')->id())->first();
        $books = $user->demands()->get();

        return view('site.demand',[
            'books' => $books
        ]);
    }


}
