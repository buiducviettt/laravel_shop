<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'avatar',
        'is_admin',
    ];
      /**
     * Cho phép user truy cập admin panel
     */
  public function canAccessPanel(\Filament\Panel $panel): bool
{// chặn user ko phải là admin 

    return (bool) $this->is_admin;
}
     /**
     * TÊN HIỂN THỊ TRONG ADMIN
     */
  public function getFilamentName(): string
{
    return trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? '').' '.'(ADMIN)')
        ?: $this->email;
}

    
    // một người có nhiều địa chỉ 
public function addresses()
{
    return $this->hasMany(Address::class);
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
}
