<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $ticket_id
 * @property string $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket $ticket
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PieceJointe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PieceJointe extends Model
{
    protected $fillable = ['ticket_id', 'file_path'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

}
