<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hide;
use Illuminate\Support\Facades\Auth;

class HideController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hires = Hide::all();
        return view('site.rents',[
            'hires' => $hires
        ]);
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
    public function store(Request $request)
    {
        $value =  str_replace(['.',','],['','.'], $request->price);

        $book = new Hide();
        $book->name = $request->name;
        $book->image_path = $request->file('arquivo')->store('public/img/users/'. Auth::guard('web')->id());
        $book->price = $value;
        $book->description = $request->description;
        $book->fk_users =  Auth::guard('web')->id();
        $book->save();

        return redirect()->back()->with('msg', 'Adicionado com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hide  $hide
     * @return \Illuminate\Http\Response
     */
    public function show(Hide $hide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hide  $hide
     * @return \Illuminate\Http\Response
     */
    public function edit(Hide $hide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hide  $hide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hide $hide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hide  $hide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hide $hide)
    {
        //
    }
}
