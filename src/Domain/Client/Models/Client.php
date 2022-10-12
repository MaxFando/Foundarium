<?php

namespace Domain\Client\Models;

use Domain\Car\Models\Car;
use Domain\Shared\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string name
 */
class Client extends BaseModel
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function car(): HasOne
    {
        return $this->hasOne(Car::class, 'client_id');
    }
}