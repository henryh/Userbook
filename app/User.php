<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
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

    protected $perPage = 30;

    /**
     * Search in all user fields.
     */
    public function scopeSearchText($query, string $search_text)
    {
        return $query
            ->where('name', 'LIKE', '%' . $search_text . '%')
            ->orWhere('email', 'LIKE', '%' . $search_text . '%')
            ->orWhere('phone', 'LIKE', '%' . $search_text . '%');
    }

    /**
     * Add sorting to query
     */
    public function scopeAddSorting($query, string $sort = null)
    {
        return (empty($sort)) ? $query : $query->orderBy($sort);
    }

    /**
     * Relations with my favorites
     *
     * @return relation
     */
    public function favourites()
    {
        return $this->belongsToMany('App\User', 'App\Favourite', 'contact_id', 'user_id')
            ->where('id', Auth::user()->id);
    }

}