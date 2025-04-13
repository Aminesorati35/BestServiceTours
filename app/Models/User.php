<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'telephone'
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function HasRole(string $role): Bool
    {
        return $this->getAttribute('role') === $role;
    }
    //Or
    public function isAdmin()
    {
        return $this->HasRole('admin');
    }
    public function isClient()
    {
        return $this->HasRole('client');
    }
    public function isSuperAdmin()
    {
        return $this->HasRole('superAdmin');
    }

    public function getRedirectRoute()
    {
        if ($this->isClient()) {
            return 'home';
        } else if ($this->isAdmin() || $this->isSuperAdmin()) {
            return 'admin.dashboard';
        }
        return 'home';
    }
}
