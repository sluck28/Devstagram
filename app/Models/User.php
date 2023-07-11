<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

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
    //aqui creamos nuestra realcion
    public  function posts()
    {   
        //un usuario puede tener muchos posts
        return $this->hasMany(Post::class);
    }
    //un usuario puede tener muchos likes
    public function likes()
    {
        return $this->hasMany(like::class);
    }

    //crear un metodo que almacena los seguidores de un usuario
    public function followers(){                //tabla       usuario     usuario a seguir
        return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    }
    //Comprobar si un usuario sigue a otro
    public function siguiendo(User $user)
    {
        return $this->followers->contains($user->id);
    }
    //Almacenar los que seguimos
    public function followings(){                //tabla       usuario     usuario a seguir
        return $this->belongsToMany(User::class,'followers','follower_id','user_id');
    }

}
