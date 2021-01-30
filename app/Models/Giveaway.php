<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giveaway extends Model
{
    use HasFactory;

    // This is how to change the key searched for when using route-model binding
    // public function getRouteKeyName()
    // {
    //     return 'name'
    // }

    protected $fillable = ['name', 'complete', 'participants_id'];
    // To remove mass assignment protection:
    // protected $guarded = [];
    public function path()
    {
        return route('giveaways.show', $this);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
