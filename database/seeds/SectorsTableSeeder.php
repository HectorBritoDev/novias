<?php

use App\Sector;
use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Recepciones
        Sector::create(['icon' => 'empty', 'sector_name' => 'Banquete', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Catering', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Decoracion y Flores', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Bodas de destino ', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Haciendas y Centros de eventos', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Noche de Bodas', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'lugares especiales para realizar las bodas', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Planes Fines de Semana', 'category_id' => 1]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Despues de la fiesta', 'category_id' => 1]);

        //Proveedores

        Sector::create(['icon' => 'empty', 'sector_name' => 'Musica, Stage y Sonido', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Carro de novios', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Ponques', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Mobiliario y Menaje', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Luna de Miel ', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Bebidas y licores', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Invitaciones', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Recordatorios', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Weding Planers', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Cursos pre matrimoniales', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Entretenimiento', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Chef a Domicilio', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Talleres de Cocina', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Paseos Gastronomicos', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Deportes Extremos', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Talleres de convivencia', 'category_id' => 2]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Lista de Regalos', 'category_id' => 2]);

        //Novias
        Sector::create(['icon' => 'empty', 'sector_name' => 'Belleza y Salud', 'category_id' => 3]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Joyeria', 'category_id' => 3]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Vestidos de Novia', 'category_id' => 3]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Despedidas de Solteras', 'category_id' => 3]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Pedidas de Mano', 'category_id' => 3]);

        //Novios
        Sector::create(['icon' => 'empty', 'sector_name' => 'Trajes de Novio', 'category_id' => 4]);
        Sector::create(['icon' => 'empty', 'sector_name' => 'Accesorios', 'category_id' => 4]);
    }
}
