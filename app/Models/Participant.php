<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['insta_name', 'giveaway_id', 'is_winner'];

    public function giveaway()
    {
        return $this->belongsTo(Giveaway::class);
    }

    public function path()
    {
        return route('participants.show', ['giveaway' => $this->giveaway_id, 'participant' => $this]);
    }
}