<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;  // Add this line

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;  // Add HasApiTokens to the list of traits

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationship: One user has one student info
    public function studentInfo(): HasOne
    {
        return $this->hasOne(StudentInfo::class);
    }
}
