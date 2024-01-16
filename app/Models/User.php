<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array
     */
    protected $fillable = [
       'id','username', 'image', 'email', 'alamat', 'password', 'level', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->level === 'admin'; // Adjust based on your actual role check logic
    }

    public function status()
    {
        return $this->status === 'blokir';
    }

    public function cart()
    {
        return $this->belongsToMany(Product::class, 'user_cart')->withPivot('quantity');
    }

    public function getFullname()
    {
        return $this->username;
    }

    public function getAlamat() {
        return $this->alamat;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAvatar()
    {
        return $this->image;
    }

    public function getId() {
        return $this->id;
    }

    public function getPassword() {
        return $this->password;

   }
}