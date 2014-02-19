<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        DB::table('users')->delete();

        User::create(
            array(
                'id' => 1,
                'first_name' => 'admin',
                'email' => 'admin@gnnomo.com.br',
                'password' => '$2y$10$QvI2bXFM3tdjAwkYNtTAfetkdR9LZOUV7Mx39gV5.jU/.On9qEyLi',
                'activated' => 1,
            )
        );
        User::create(
            array(
                'id' => 2,
                'first_name' => 'jorge',
                'email' => 'jorge@gnnomo.com.br',
                'password' => '$2y$10$QvI2bXFM3tdjAwkYNtTAfetkdR9LZOUV7Mx39gV5.jU/.On9qEyLi',
                'activated' => 1,
            )
        );
        User::create(
            array(
                'id' => 3,
                'first_name' => 'marcelo',
                'email' => 'marcelo@gnnomo.com.br',
                'password' => '$2y$10$QvI2bXFM3tdjAwkYNtTAfetkdR9LZOUV7Mx39gV5.jU/.On9qEyLi',
                'activated' => 1,
            )
        );
        User::create(
            array(
                'id' => 4,
                'first_name' => 'thomas',
                'email' => 'thomas.adm@gmail.com',
                'password' => '$2y$10$QvI2bXFM3tdjAwkYNtTAfetkdR9LZOUV7Mx39gV5.jU/.On9qEyLi',
                'activated' => 1,
            )
        );
        User::create(
            array(
                'id' => 5,
                'first_name' => 'Lilian Midori Ojeda Kuryura',
                'email' => 'lilianmidori@gmail.com',
                'password' => '$2y$10$QvI2bXFM3tdjAwkYNtTAfetkdR9LZOUV7Mx39gV5.jU/.On9qEyLi',
                'activated' => 1,
            )
        );

    }

}
