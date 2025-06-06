<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'document_type', 'document_path'
    ];

    // Relation
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
