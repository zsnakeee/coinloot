<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravolt\Avatar\Facade as Avatar;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function name(): string
    {
        return $this->username;
    }

    public function avatar()
    {
        return $this->profile_photo_path ? \Storage::url($this->profile_photo_path) : Avatar::create($this->name())->toBase64();
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function withdrawals(): HasMany
    {
        return $this->hasMany(Withdrawal::class)->orderBy('created_at', 'desc');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class)->orderBy('created_at', 'desc');
    }

    public function bonusHistory(): HasMany
    {
        return $this->hasMany(BonusHistory::class);
    }

    public function addPoints(int $points): void
    {
        $this->current_points += $points;
        $this->today_points += $points;
        $this->total_points += $points;
        $this->save();
    }
}
