<?php

namespace App\Http\Controllers;

use App\Models\Giveaway;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Giveaway $giveaway)
    {
        $participants = Participant::get()->where('giveaway_id', $giveaway->id);
        return view('participants.index', compact('giveaway', 'participants'));
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
        Participant::create($this->validateParticipant());

        return redirect(route('participants.index', $giveaway));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Giveaway $giveaway, Participant $participant)
    {
        return view('participants.show', compact('giveaway', 'participant'));
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
        Participant::destroy($participant);

        return redirect('participants.index');
    }

    protected function validateParticipant()
    {
        return request()->validate([
            'insta_name' => 'required',
            'giveaway_id' => 'required',
            'is_winner' => 'nullable|boolean'
        ]);
    }
}
