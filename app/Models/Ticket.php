<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'priority_id', 'status', 'user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Categorie::class);
    }

    public function priority() {
        return $this->belongsTo(Priorite::class);
    }

    public function comments() {
        return $this->hasMany(Commentaire::class);
    }

    public function attachments() {
        return $this->hasMany(PieceJointe::class);
    }
}
