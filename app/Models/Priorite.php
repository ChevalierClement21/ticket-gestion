<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PrioriteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priorite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Priorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'level'
    ];
}
