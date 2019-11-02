<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        //get fired whenever a new User is created 
        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username
            ]);

            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }
}
