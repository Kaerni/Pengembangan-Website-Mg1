<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasFactory, MustVerifyEmailTrait, Notifiable, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = ['id'];

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

    protected function formattedName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => strtoupper($attributes['name'] ?? ''),
        );
    }

    protected function nameWithRole(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ($attributes['name'] ?? '') . ' (' . ucfirst($attributes['role'] ?? 'user') . ')',
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucwords(strtolower($value)),
        );
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeAdult($query, $minAge = 18)
    {
        return $query->where('age', '>=', $minAge);
    }

    use HasApiTokens;
}