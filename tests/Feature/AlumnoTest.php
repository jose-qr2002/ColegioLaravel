<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_index(): void
    {
        $response = $this->get(route('alumnos.index'));
        $response->assertStatus(200);
        $response->assertViewIs('alumnos.index');
    }

    public function test_create(): void
    {
        $alumnoData = [
            'nombres' => 'Juan Benito',
            'apellidos' => 'Perez Mamani',
            'dni' => '67564332'
        ];

        $response = $this->post(route('alumnos.store'), $alumnoData);
        $response->assertStatus(302);
        $response->assertRedirect(route('alumnos.index'));

        $this->assertDatabaseHas('alumnos', [
            'nombres' => 'Juan Benito',
            'apellidos' => 'Perez Mamani',
            'dni' => '67564332'
        ]);
    }

    public function test_create_validation():void {
        // dni errors
        $dni_errors = array('', '56767', '786786671', '40633368');
        foreach($dni_errors as $dni) {
            $alumnoData = [
                'dni' => $dni,
            ];
            $response = $this->post(route('alumnos.store'), $alumnoData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'dni',
            ]);
        }// end foreach

        // data errors
        $data_errors = array(
            [
                'dni' =>  '',
                'nombres' => '',
                'apellidos' => '',
            ],
            [
                'dni' => '7854213734454654',
                'nombres' => ' 12 131',
                'apellidos' => ' 1241 41',
            ],
            [
                'dni' => '12a@ddaw',
                'nombres' => 'jkqr2020@gmail.com',
                'apellidos' => '**/*dds*1',
            ]
        );

        foreach($data_errors as $data) {
            $alumnoData = [
                'dni' => $data['dni'],
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
            ];
            $response = $this->post(route('alumnos.store'), $alumnoData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'dni',
                'nombres',
                'apellidos'
            ]);
        }// end foreach
    }// end function

    public function test_create_exception():void {
        $nombre="Jose";
        for($i=0;$i<255;$i++){
            $nombre.="Jose";
        }

        $alumnoData = [
            'dni'=>'44521761',
            'nombres' => $nombre,
            'apellidos' => 'Morales',
        ];

        $response = $this->post(route('alumnos.store'), $alumnoData);
        $response->assertStatus(302);
        $response->assertSessionHas('mensaje');
        $response->assertSessionHas('tipo', 'danger');

        $this->assertDatabaseMissing('alumnos', [
            'dni' => $alumnoData['dni'],
            'nombres' => $alumnoData['nombres'],
            'apellidos' => $alumnoData['apellidos'],
        ]);
    }
}