<?php

namespace App\Http\Controllers;

use App\Models\Giveaway;
use Illuminate\Http\Request;

class GiveawayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giveaways = Giveaway::get();
        return view('giveaways.index', compact('giveaways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('giveaways.create');
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
        return view('giveaways.edit', compact('giveaway'));
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
        Giveaway::destroy($giveaway);

        return redirect('giveaways.index');
    }

    protected function validateGiveaway()
    {
        return request()->validate([
            'name' => 'required',
            'complete' => 'nullable|boolean'
        ]);
    }
}
