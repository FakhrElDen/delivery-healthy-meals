<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as VoyagerUser;

class User extends VoyagerUser
{
    use Notifiable;

    protected $fillable = [
        'id', 'name', 'email', 'password', 'is_active', 'age', 'phone', 'first_time', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUser($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUserById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function activateUser($email)
    {
        return $this->where('email', $email)->update(['is_active' => 1]);
    }

    public function updatePassword($id, $password)
    {
        return $this->where('id', $id)->update(['password' => $password]);
    }

    public function markAsFirstTime($id)
    {
        return $this->where('id', $id)->update(['first_time' => 1]);
    }

    public function updateUserData($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function getNormalUsers()
    {
        return $this->where('role_id', 2)->get(['email', 'id'])->toArray();
    }

    public function createUser($data)
    {
        return $this->create($data);
    }

    public function getAllUsers()
    {
        return $this->where('role_id', 2)->get()->toArray();
    }

    public function deleteUser($id)
    {
        return $this->where('id', $id)->delete();
    }
}