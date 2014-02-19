<?php

class ResidentTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        DB::table('residents')->delete();

        Resident::create(
            array(
                'id' => 1,
                'name' => 'Thomas Kuryura',
                'email' => 'thomas.adm@gmail.com',
                'cpf' => '277.743.638-07',
                'rg' => '2092292',
                'contact_phone' => '(11) 9765-46556',
                'birthdate' => '06/09/1978',
                'gender' => 'M'
            )
        );
        Resident::create(
            array(
                'id' => 2,
                'name' => 'Lilian Midori Ojeda Kuryura',
                'email' => 'lilianmidori@gmail.com',
                'cpf' => '277.743.638-07',
                'rg' => '2092292',
                'contact_phone' => '(11) 99473-7745',
                'birthdate' => '11/07/1979',
                'gender' => 'F'
            )
        );
    }

}
