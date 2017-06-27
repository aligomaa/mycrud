<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function formstore($request)
{

$name=$request->input('name');
$email=$request->input('email');
$phone=$request->input('phone');
$password= Hash::make( $request->input('password'));

    $users= new User();
    $users->name=$name;
    $users->email=$email;
    $users->phone=$phone;
    $users->password=$password;
    $users->save();
    
}    
}
