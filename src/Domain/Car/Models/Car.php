<?php

namespace Domain\Car\Models;

use Domain\Client\Models\Client;
use Domain\Shared\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string mark
 * @property int|null client_id
 * @property float price
 *
 * @property Client client
 *
 * @method static Builder|self free()
 */
class Car extends BaseModel
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function scopeFree(): Builder
    {
        return $this->whereNull('client_id');
    }
}
