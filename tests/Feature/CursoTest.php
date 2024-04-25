<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CursoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_index(): void
    {
        $response = $this->get('/cursos');
        $response->assertStatus(200);
        $response->assertViewIs('cursos.index');
    }

    public function test_create(): void
    {
        $cursosData = [
            'nombre' => 'Desarrollo Humano',
            'codigo' => 'YU143',
            'modalidad' => 'Presencial',
            'carrera' => 'Ingeniería de Soporte TI',
            'ciclo' => 'IV'
        ];

        $response = $this->post(route('cursos.store'), $cursosData);
        $response->assertStatus(302);
        $response->assertRedirect(route('cursos.index'));

        $this->assertDatabaseHas('cursos', [
            'nombre' => 'Desarrollo Humano',
            'codigo' => 'YU143',
            'modalidad' => 'Presencial',
            'carrera' => 'Ingeniería de Soporte TI',
            'ciclo' => 'IV'
        ]);
    }
    
    public function test_create_validation():void {
        $codigo_errors = array('', '1', 'fgerfw425', 'AB453');
        foreach($codigo_errors as $codigo) {
            $cursosData = [
                'codigo' => $codigo,
            ];
            $response = $this->post(route('cursos.store'), $cursosData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'codigo',
            ]);
        }// end foreach

        // data errors
        $data_errors = array(
            [
                'nombre' => 'ddd@dsq33?=)',
                'codigo' => 'AB453',
                'modalidad' => 'No Presencial',
                'carrera' => 'Ingenieria Bioquimica',
                'ciclo' => 'XI'
            ],
            [
                'nombre' => 'Estidio de la tierra (Agricultura)',
                'codigo' => 'Y',
                'modalidad' => 'Normal',
                'carrera' => 'ingenieria',
                'ciclo' => 'XX'
            ],
            [
                'nombre' => '',
                'codigo' => '',
                'modalidad' => '',
                'carrera' => '',
                'ciclo' => ''
            ]
        );

        foreach($data_errors as $data) {
            $cursosData = [
                'nombre' => $data['nombre'],
                'codigo' => $data['codigo'],
                'modalidad' => $data['modalidad'],
                'carrera' => $data['carrera'],
                'ciclo' => $data['ciclo']
            ];
            $response = $this->post(route('cursos.store'), $cursosData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'codigo',
                'nombre',
                'ciclo',
                'carrera',
                'modalidad'
            ]);
        }// end foreach
    }// end function

    public function test_create_exception():void {
        $nombre="Lenguaje";
        for($i=0;$i<255;$i++){
            $nombre.="Lenguaje";
        }

        $cursosData = [
            'nombre' => $nombre,
            'codigo' => 'AB459',
            'modalidad' => 'Presencial',
            'carrera' => 'Ingeniería de Soporte TI',
            'ciclo' => 'III'
        ];

        $response = $this->post(route('cursos.store'), $cursosData);
        $response->assertStatus(302);
        $response->assertSessionHas('mensaje');
        $response->assertSessionHas('tipo', 'danger');

        $this->assertDatabaseMissing('cursos', [
            'nombre' => $cursosData['nombre'],
            'codigo' => $cursosData['codigo'],
            'modalidad' => $cursosData['modalidad'],
            'carrera' => $cursosData['carrera'],
            'ciclo' => $cursosData['ciclo']
        ]);
    }
}
