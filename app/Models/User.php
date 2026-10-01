<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Pasang trait SoftDeletes di sini (Cukup panggil SEKALI saja di paling atas)
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     */
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

    /**
     * ACCESSOR: Mengubah format tampilan nama menjadi KAPITAL SEMUA
     * Dipanggil via: $user->formatted_name
     */
    protected function formattedName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => strtoupper($attributes['name'] ?? ''),
        );
    }

    /**
     * ACCESSOR: Menggabungkan Nama dan Role
     * Dipanggil via: $user->name_with_role
     */
    protected function nameWithRole(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ($attributes['name'] ?? '') . ' (' . ucfirst($attributes['role'] ?? 'user') . ')',
        );
    }

    /**
     * MUTATOR: Otomatis mengubah input nama menjadi ucwords (Huruf Depan Kapital) sebelum disimpan
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucwords(strtolower($value)),
        );
    }

    /**
     * Helper method untuk cek apakah user adalah Admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Helper method untuk cek apakah user adalah User biasa
     */
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
}