<?php

class Group extends Eloquent
{
    public function users()
    {
        return $this->belongsToMany('User', 'users_groups', 'user_id', 'group_id');
    }
}
