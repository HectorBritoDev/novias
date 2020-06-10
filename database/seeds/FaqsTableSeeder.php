<?php

use App\Faq;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Faq::create(['question' => '¿Horas extra?', 'answer' => 'Si, pero no en la madrugada', 'user_id' => 3]);
        Faq::create(['question' => 'Capacidad de personas', 'answer' => '400', 'user_id' => 3]);
        Faq::create(['question' => 'Estacionamiento', 'answer' => 'Si, para 20 vehículos', 'user_id' => 3]);

        // Faq::create(['question' => 'Cobro minimo', 'user_id' => 3]);
        // Faq::create(['question' => 'Numero de invitados', 'user_id' => 3]);
        // Faq::create(['question' => 'Precio por menu', 'user_id' => 3]);

        // Faq::create(['question' => 'Cobro minimo', 'user_id' => 3]);
        // Faq::create(['question' => 'Que tipo de ponqués ofrece', 'user_id' => 3]);
        // Faq::create(['question' => 'Precio por menu', 'user_id' => 3]);

        // Faq::create(['question' => 'Cobro minimo', 'user_id' => 3]);
        // Faq::create(['question' => 'Experiencia', 'user_id' => 3]);
        // Faq::create(['question' => 'Mas de un evento al día', 'user_id' => 3]);

        // Faq::create(['question' => 'Cobro minimo', 'user_id' => 3]);
        // Faq::create(['question' => 'Diseños a medida?', 'user_id' => 3]);
        // Faq::create(['question' => 'Formas de pago', 'user_id' => 3]);

        // Faq::create(['question' => 'Cobro minimo', 'sector_id' => 6]);
        // Faq::create(['question' => 'Previa cita necesaria?', 'sector_id' => 6]);
        // Faq::create(['question' => 'Horario de trabajo', 'sector_id' => 6]);

        // Faq::create(['question' => 'Cobro minimo', 'sector_id' => 7]);
        // Faq::create(['question' => 'Previa cita necesaria?', 'sector_id' => 7]);
        // Faq::create(['question' => 'Horario de trabajo', 'sector_id' => 7]);

        // Faq::create(['question' => 'Cobro minimo', 'sector_id' => 8]);
        // Faq::create(['question' => 'Previa cita necesaria?', 'sector_id' => 8]);
        // Faq::create(['question' => 'Horario de trabajo', 'sector_id' => 8]);
    }
}
