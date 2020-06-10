<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USER
        User::create([
            'name' => 'User',
            'email' => 'user@dev.com',
            'password' => bcrypt('123456'),
            'marrige_date' => '2018-11-02',
            'gender' => 'male',
            'departamento_id' => '11',
            'municipio_id' => 107,
        ]);

        //ADMIN
        User::create([
            'name' => 'Admin',
            'role' => 0,
            'email' => 'admin@dev.com',
            'password' => bcrypt('123456'),
            'marrige_date' => '2018-11-02',
            'gender' => 'male',
            'departamento_id' => '11',
            'municipio_id' => 107,
        ]);

        //RECEPTIONS
        User::create(
            [
                'role' => 2,
                'name' => 'Tequeños de Bogotá',
                'email' => 'tequenos@dev.com',
                'password' => bcrypt('123456'),
                'provider_description' => 'Somos una empresa dedidacada a la producción de de altísima calidad.
Contamos con un equipo  que lleva años de experiencia en el area.
Somos tu mejor elección',
                'provider_min_cost' => 2500,
                'provider_adress' => 'Calle Bolivar, local Nº24.',
                'provider_contact_name' => 'Simón',
                'provider_contact_email' => 'tequeños@dev.com',
                'provider_contact_phone' => '04142355698',
                'municipio_id' => 1,
                'provider_sector_id' => 1,
                'provider_category_id' => 1,
            ]);

        //PROVIDERS
        User::create(
            [
                'role' => 2,
                'name' => 'Tortas de Bogotá',
                'email' => 'tortas@dev.com',
                'password' => bcrypt('123456'),
                'provider_description' => 'Somos una empresa dedidacada a la producción de Tortas gourmet de altísima calidad.
Contamos con un equipo  que lleva años de experiencia en el area.
Somos tu mejor elección',
                'provider_min_cost' => 2500, 'provider_adress' => 'Calle Bolivar, local Nº24.',
                'provider_contact_name' => 'Simón',
                'provider_contact_email' => 'tequeños@dev.com',
                'provider_contact_phone' => '04142355698',
                'municipio_id' => 1,
                'provider_sector_id' => 12,
                'provider_category_id' => 2,

            ]);

        //NOVIA

    }
}
