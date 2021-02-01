<?php

namespace App\Http\Controllers;

use App\Models\Giveaway;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
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

    public function index(Giveaway $giveaway)
    {
        $user_id = Auth::id();
        $participants = Participant::where('user_id', $user_id)->orderBy('insta_name')->get();
        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Giveaway $giveaway)
    {
        return view('participants.create', compact('giveaway'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Giveaway $giveaway)
    {
        $participant = Participant::create($this->validateParticipant());

        return $participant;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Giveaway $giveaway, Participant $participant)
    {
        return redirect(route('participants.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Giveaway $giveaway, Participant $participant)
    {
        return view('participants.edit', compact('giveaway', 'participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Giveaway $giveaway, Participant $participant)
    {
        $participant->update($this->validateParticipant());

        return $participant;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giveaway $giveaway, Participant $participant)
    {
        $participant->delete();

        return $participant;
    }

    protected function validateParticipant()
    {
        return request()->validate([
            'insta_name' => 'required',
            'giveaway_id' => 'required',
            'user_id' => 'required',
            'is_winner' => 'nullable|boolean'
        ]);
    }
}
