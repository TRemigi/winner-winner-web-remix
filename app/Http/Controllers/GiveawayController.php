<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Giveaway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiveawayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::id();
        $giveaways = Giveaway::where('user_id', $user_id)->get();
        return view('giveaways.index', compact('giveaways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::id();
        return view('giveaways.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $giveaway = Giveaway::create($this->validateGiveaway());

        return $giveaway;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function show(Giveaway $giveaway)
    {
        $participants = $giveaway->participants;
        return view('giveaways.show', compact('giveaway', 'participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function edit(Giveaway $giveaway)
    {
        $user = Auth::id();
        return view('giveaways.edit', compact('giveaway', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function update(Giveaway $giveaway)
    {
        $giveaway->update($this->validateGiveaway());

        return $giveaway;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giveaway $giveaway)
    {
        $giveaway->delete();

        return $giveaway;
    }

    protected function validateGiveaway()
    {
        return request()->validate([
            'name' => 'required',
            'complete' => 'nullable|boolean',
            'user_id' => 'required'
        ]);
    }
}
