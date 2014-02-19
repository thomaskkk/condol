<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Group::create(array(
                'id' => 1,
                'name' => 'Administradores',
                'permissions' => '{"groups.index":1,"groups.create":1,"groups.store":1,"groups.show":1,"groups.edit":1,"groups.update":1,"groups.destroy":1,"users.index":1,"users.create":1,"users.store":1,"users.show":1,"users.edit":1,"users.update":1,"users.destroy":1,"residents.index":1,"residents.create":1,"residents.store":1,"residents.show":1,"residents.edit":1,"residents.update":1,"residents.destroy":1}'
        ))->belongsToMany('User', 'users_groups', 'user_id', 'group_id')->attach(1);
        Group::create(array(
                'id' => 2,
                'name' => 'Síndicos',
                'permissions' => '{"groups.index":1,"groups.show":1,"users.index":1,"users.show":1,"residents.index":1,"residents.create":1,"residents.store":1,"residents.show":1,"residents.edit":1,"residents.update":1,"residents.destroy":1}'
        ))->belongsToMany('User', 'users_groups', 'user_id', 'group_id')->attach(2);
        Group::create(array(
                'id' => 3,
                'name' => 'Sub-síndicos',
                'permissions' => '{"groups.index":1,"groups.show":1,"users.index":1,"users.show":1,"residents.index":1,"residents.create":1,"residents.store":1,"residents.show":1,"residents.edit":1,"residents.update":1,"residents.destroy":1}'
        ))->belongsToMany('User', 'users_groups', 'user_id', 'group_id')->attach(3);
        Group::create(array(
                'id' => 4,
                'name' => 'Conselheiros',
                'permissions' => '{"groups.index":1,"groups.show":1,"users.index":1,"users.show":1,"residents.index":1,"residents.show":1}'
        ))->belongsToMany('User', 'users_groups', 'user_id', 'group_id')->attach(4);
        Group::create(array(
                'id' => 5,
                'name' => 'Moradores',
                'permissions' => '{"residents.index":1,"residents.show":1}'
        ))->belongsToMany('User', 'users_groups', 'user_id', 'group_id')->attach(5);
    }

}
