<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //informacion de la base de datos que se lee hacia la base de datos
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    public function user()
    {
        //utilizamos el select para traer datos especificos
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comments()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }

    //manera de saber si el usuario ya le dio like a una publicacion 
    public function checklike(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }
}
