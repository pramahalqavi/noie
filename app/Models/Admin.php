<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {
    use Notifiable;

    protected $guard = 'admin';
    public $timestamps = false;
    protected $table = 'admins';
    protected $primaryKey = 'email';
    protected $fillable = array('email', 'password');
    protected $hidden = array('password');
    public $incrementing = false;

    public function getEmail() {
        return $this->getAttributes()["email"];
    }
}
