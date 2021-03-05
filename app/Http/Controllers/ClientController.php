<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $model)
    {
        //
        $clients = Client::orderBy('name')->paginate(15);
        return view('client.index', ['client' => $model->paginate(15)])->with('client', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'city' => 'required',
        ]);
        
        $client = Client::create(['name' => $request->name,'city' => $request->city]);
        return redirect('/client/'.$client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
         return view('client.show',compact('client',$client));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit',compact('client',$client));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'city' => 'required',
        ]);
        
        $client->name = $request->name;
        $client->city = $request->city;
        $client->save();
        $request->session()->flash('message', 'Successfully modified the Client!');
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $request->session()->flash('message', 'Successfully deleted the client!');
        return redirect('client');
    }
}
