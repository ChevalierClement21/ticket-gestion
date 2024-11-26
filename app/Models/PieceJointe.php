<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    protected $fillable = ['ticket_id', 'file_path'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

}
