<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $categorie_id
 * @property int $priorite_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $developer_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PieceJointe> $attachments
 * @property-read int|null $attachments_count
 * @property-read \App\Models\Categorie $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Commentaire> $commentaire
 * @property-read int|null $commentaire_count
 * @property-read \App\Models\User|null $developer
 * @property-read \App\Models\Priorite $priorite
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TicketFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePrioriteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUserId($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'category_id', 'priorite_id', 'status', 'user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }

    public function priorite() {
        return $this->belongsTo(Priorite::class,'priorite_id');
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    public function attachments() {
        return $this->hasMany(PieceJointe::class);
    }

    public function developer(){
        return $this->belongsTo(User::class, 'developer_id');
    }

}
