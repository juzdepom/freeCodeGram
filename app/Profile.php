<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        //either return the profile image or the default no image png
        $imagePath = ($this->image) ? $this->image : 'profile/8M7L86JjY8zE5BmmYfH2J8x35hED9j41dSWZgNbr.png';
        return '/storage/' .  $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
