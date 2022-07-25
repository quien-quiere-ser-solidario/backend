<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$kSECnmXftV9Wv58GV0li0uavngQVHVlBuVG4Uesod8jRl/hlr/5k6',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'username' => 'user',
            'email' => 'user@user.com',
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => 'Rad Mobile',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => 'Sonic The Hedgehog',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Super Mario 64',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Mega Man',
            'is_correct' => false
        ])->create([
            'question' => '¿En qué juego apareció Sonic por primera vez?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => 'Wilson',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => 'Friday',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Jones',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Billy',
            'is_correct' => false
        ])->create([
            'question' => '¿Qué nombre le puso Tom Hank a su pelota de volleyball en la película "Naufrago"?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Gazela de Tomson',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Guepardo',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Antílope americano',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'León',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Cual es el animal más rápido en tierra?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Oculus',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'HTC',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Razer',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Google',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Con qué empresa colaboró Valve para la creación de Vive?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Plata',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Oro',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Hierro',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Estaño',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Qué elemento tiene el símbolo químico "Fe"?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Hamlet',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Macbeth',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Romeo y Julieta',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Otelo',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Qué obra de Shakespeare inspiró el musical de "West Side Story"?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Hamlet',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Macbeth',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Romeo y Julieta',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Otelo',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Qué obra de Shakespeare inspiró el musical de "West Side Story"?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Homo Ergaster',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Homo Neardental',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Homo Sapiens',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Homo Erectus',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Cómo es el nombre científico de los humanos modernos?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Cárcel',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Ve a la cárcel',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Parking Gratuito',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Compañía Eléctrica',
                'is_correct' => false
            
        ])->create([
            'question' => 'En un tablero de Monopoly estandar: ¿cual es la casilla que esta diagonalmente opuesta a la Salida?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => '2',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '4',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '3',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => '5',
                'is_correct' => false
            
        ])->create([
            'question' => 'Si un "360 no-scope" es dar una vuelta entera antes de disparar, ¿cuantas vueltas se necesitan para hacer un "1080 no-scope"?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Japonesa',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'China',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Koreana',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Vietnamita',
                'is_correct' => false
            
        ])->create([
            'question' => '¿De qué nacionalidad es "D.Va" del juego Overwatch?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => '"Jelly Bean"',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '"Ice Cream Sandwich"',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '"Marshmallow"',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '"Nougat"',
                'is_correct' => true
            
        ])->create([
            'question' => '¿Cual es el nombre en clave que le otorgaron a la versión Android 7.0?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Península Europea',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Península Escandinava',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Península Peloponesa',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Península Ibérica',
                'is_correct' => true
            
        ])->create([
            'question' => '¿Como se llama la península donde está España y Portugal?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Lewis Hamilton',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Max Verstappen',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Kimi Raikkonen',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Nico Rosberg',
                'is_correct' => true
            
        ])->create([
            'question' => '¿Quién ganó la Competición Mundial de Formula 1 de 2016?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Half-Life 2',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Team Fortress',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Half-Life',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Counter-Strike 1.6',
                'is_correct' => true
            
        ])->create([
            'question' => '¿Qué juego fue usado para anunciar Steam?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => '1919',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '1925',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '1905',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => '1914',
                'is_correct' => true
            
        ])->create([
            'question' => '¿En qué año empezó la Primera Guerra Mundial?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Isla Sorna',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Isla Nublar',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Isla Pena',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Isla Muerta',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Cual es el nombre de la isla donde está construido el parque de "Jurassic Park"?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Escocia',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'República de Kiribati',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Sri Lanka',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Bután',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Cual de los siguientes paises tiene en la bandera un león amarillo empuñando una espada en un fondo rojo oscuro?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Joseph Stalin',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Vladimir Putin',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Vladimir Lenin',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Mikhail Gorbachev',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Quien lideró la Revolución Comunista de Rusia?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'A los pájaros',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'A los perros',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'A los gérmenes',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'A volar',
                'is_correct' => false
            
        ])->create([
            'question' => '¿A qué tiene miedo una persona con Cinofobia?'
        ]);
        Question::factory()->hasAnswers(1,[
            
                'answer' => 'Clérigo',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Sacerdote',
                'is_correct' => true
            ])->hasAnswers(1,
            [
                'answer' => 'Monje',
                'is_correct' => false
            ])->hasAnswers(1,
            [
                'answer' => 'Sabio',
                'is_correct' => false
            
        ])->create([
            'question' => '¿Cual de las siguientes respuestas es una clase real en el juego "Hearthstone"?'
        ]);
        Question::factory()->hasAnswers(1,[
            'answer' => 'País',
            'is_correct' => true
        ])->hasAnswers(1,[
            'answer' => 'Región',
            'is_correct' => false
        ])->hasAnswers(1,[
            'answer' => 'Río',
            'is_correct' => false
        ])->hasAnswers(1,[
            'answer' => 'Ciudad',
            'is_correct' => false
        ])->create([
            'question' => '¿Qué es Laos?'
        ]);
        Question::factory()->hasAnswers(1,[
            'answer' => 'Guerra Fría',
            'is_correct' => true
        ])->hasAnswers(1,[
            'answer' => 'Tercera Guerra Mundial',
            'is_correct' => false
        ])->hasAnswers(1,[
            'answer' => 'Guerra de Vietnam',
            'is_correct' => false
        ])->hasAnswers(1,[
            'answer' => 'Primera Guerra Mundial',
            'is_correct' => false
        ])->create([
            'question' => '¿En qué guerra se inspira "Call Of Duty: Black Ops"?'
        ]);
        Question::factory()->hasAnswers(1,[
            'answer' => 'Génesis',
            'is_correct' => true
        ])->hasAnswers(1,
        [
            'answer' => 'Éxodo',
            'is_correct' => false
        ])->hasAnswers(1,
        [
            'answer' => 'Levítico',
            'is_correct' => false
        ])->hasAnswers(1,
        [
            'answer' => 'Número',
            'is_correct' => false
        ])->create([
            'question' => '¿Cual es el primer libro del Viejo Testamento?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => 'Alexander Flemming',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => 'Marie Curie',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Alfred Nobel',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Louis Pasteur',
            'is_correct' => false
        ])->create([
            'question' => '¿Quien descubrió la Penicilina?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => '32',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => '16',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => '20',
            'is_correct' => false
        ])->hasAnswers(1,
        [
            'answer' => '36',
            'is_correct' => false
        ])->create([
            'question' => '¿Cuantas piezas hay en el tablero al empezar una partida de Ajedrez?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => 'Unreal Engine',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => 'Unity Engine',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Game Maker: Studio',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Cry Engine',
            'is_correct' => false
        ])->create([
            'question' => '¿Cual de estos motores de videojuegos fue creado por Epic Games?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => 'Pan',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => 'Trigo',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Leche',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => 'Huevo',
            'is_correct' => false
        ])->create([
            'question' => '¿Cual de estos ingredientes NO se necesita para hacer un pastel en Minecraft?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => '140',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => '100',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => '160',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => '200',
            'is_correct' => false
        ])->create([
            'question' => '¿Cual era el límite original de carácteres de Twitter (El primero)?'
        ]);
        Question::factory()->hasAnswers(1, [
            'answer' => '25',
            'is_correct' => true
        ])->hasAnswers(1, [
            'answer' => '41',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => '69',
            'is_correct' => false
        ])->hasAnswers(1, [
            'answer' => '19',
            'is_correct' => false
        ])->create([
            'question' => '¿Cuantos puntos anotó LeBron James en su primer partido en la NBA?'
        ]);
    }
}
