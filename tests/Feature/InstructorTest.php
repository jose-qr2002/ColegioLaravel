<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstructorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_index(): void
    {
        $response = $this->get('/instructores');
        $response->assertStatus(200);
        $response->assertViewIs('instructores.index');
    }

    public function test_create(): void
    {
        $instructorData = [
            'dni' => '75465176',
            'nombres' => 'Carlos Daniel',
            'apellidos' => 'García Rei',
            'celular' => '945412481',
            'direccion' => 'Santa Rosa Mz x Lt 5',
            'profesion' => 'Ingeniería de Sistemas',
            'grado_instruccion' => 'Técnico',
            'salario' => '1200',
            'anios_experiencia' => 1
        ];

        $response = $this->post(route('instructores.store'), $instructorData);
        $response->assertStatus(302);
        $response->assertRedirect(route('instructores.index'));

        $this->assertDatabaseHas('instructores', [
            'dni' => '75465176',
            'nombres' => 'Carlos Daniel',
            'apellidos' => 'García Rei',
            'celular' => '945412481',
            'direccion' => 'Santa Rosa Mz x Lt 5',
            'profesion' => 'Ingeniería de Sistemas',
            'grado_instruccion' => 'Técnico',
            'salario' => '1200',
            'anios_experiencia' => 1
        ]);
    }
    
    public function test_create_validation():void {
        ////
        $dni_errors = array('', '56767', '786786671', '02314891');
        foreach($dni_errors as $dni) {
            $instructorData = [
                'dni' => $dni,
            ];
            $response = $this->post(route('instructores.store'), $instructorData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'dni',
            ]);
        }// end foreach

        // data errors
        $data_errors = array(
            [
                'dni' => '',
                'nombres' => '',
                'apellidos' => '',
                'celular' => '',
                'direccion' => '',
                'profesion' => '',
                'grado_instruccion' => '',
                'salario' => '',
                'anios_experiencia' => ''
            ],
            [
                'dni' => '02314891234',
                'nombres' => 'Carlos12',
                'apellidos' => 'García1200',
                'celular' => '',
                'direccion' => '',
                'profesion' => 'Ingeniería Pesquera',
                'grado_instruccion' => 'Bachiller',
                'salario' => 'dsad',
                'anios_experiencia' => -4
            ],
            [
                'dni' => 'fdfdfe',
                'nombres' => 'correo@correo.com',
                'apellidos' => '*******',
                'celular' => 'numero',
                'direccion' => '',
                'profesion' => '1',
                'grado_instruccion' => 'Profesor',
                'salario' => 'mil cien',
                'anios_experiencia' => -100
            ]
        );

        foreach($data_errors as $data) {
            $instructorData = [
                'dni' => $data['dni'],
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'celular' => $data['celular'],
                'direccion' => $data['direccion'],
                'profesion' => $data['profesion'],
                'grado_instruccion' => $data['grado_instruccion'],
                'salario' => $data['salario'],
                'anios_experiencia' => $data['anios_experiencia'],
            ];
            $response = $this->post(route('instructores.store'), $instructorData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'dni',
                'nombres',
                'apellidos',
                'celular',
                'direccion',
                'profesion',
                'grado_instruccion',
                'salario',
                'anios_experiencia'
            ]);
        }// end foreach
    }// end function
}
