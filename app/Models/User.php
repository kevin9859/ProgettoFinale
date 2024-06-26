<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

 public function articles(){
    return $this->hasMany(Article::class);
 }
    public function posts()
{
    return $this->hasMany(Post::class,);
}
public function followers()
{
    return $this->belongsToMany(User::class, 'user_follower', 'user_id', 'follower_id');
}

public function following()
{
    return $this->belongsToMany(User::class, 'user_follower', 'follower_id', 'user_id');
}
public function isFollowing(User $user)
{
    return $this->following()->where('user_id', $user->id)->exists();
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_revisor',
        'is_writer',
        'profile_photo_path',
        'bio',
        'date_of_birth',
        'phone_number',
        'website',
        'profession',
        'interests',
        'location',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
      
    ];

   
}
