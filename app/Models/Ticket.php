<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'category_id', 'priorite_id', 'status', 'user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function priorite() {
        return $this->belongsTo(Priorite::class);
    }

    public function commentaire() {
        return $this->hasMany(Commentaire::class);
    }

    public function attachments() {
        return $this->hasMany(PieceJointe::class);
    }
}
