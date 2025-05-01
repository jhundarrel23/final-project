<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'subsidy_amount', 
        'transaction_date', 'release_date', 
        'semester', 'school_year', 'remarks', 
        'is_active'
    ];

    // Relation
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
