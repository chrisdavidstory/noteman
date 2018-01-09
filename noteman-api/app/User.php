<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Webpatser\Uuid\Uuid;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->api_key = (string) Uuid::generate(4);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function checkPassword($inputPassword) {
        return password_verify($inputPassword, $this->password);
    }
}
