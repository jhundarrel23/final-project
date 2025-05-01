<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'application_id',
        'relation',
        'given_name',
        'middle_name',
        'family_name',
        'occupation'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
