<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatriculaTest extends TestCase
{
    use RefreshDatabase;
    public function test_index(): void
    {
        $response = $this->get(route('matriculas.index'));
        $response->assertStatus(200);
        $response->assertViewIs('matriculas.index');
    }

    public function test_create(): void
    {
        $matriculaData = [
            'idCurso' => 1,
            'idAlumno' => 2,
            'anioAcad' => '2023-I'
        ];

        $response = $this->post(route('matriculas.store'), $matriculaData);
        $response->assertStatus(302);
        $response->assertRedirect(route('matriculas.index'));

        $this->assertDatabaseHas('matriculas', [
            'idCurso' => $matriculaData['idCurso'],
            'idAlumno' => $matriculaData['idAlumno'],
            'anioAcad' => $matriculaData['anioAcad']
        ]);
    }

    public function test_create_validation():void {
        // Se trata de registrar una matricula repetida
        $matriculaData = [
            [
                'idCurso' => '',
                'idAlumno' => '',
                'anioAcad' => ''
            ],
            [
                'idCurso' => 8,
                'idAlumno' => 9,
                'anioAcad' => '2024-I8987'
            ]
        ];

        foreach($matriculaData as $data) {
            $response = $this->post(route('matriculas.store'), $data);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'idCurso',
                'idAlumno',
                'anioAcad'
            ]);
        }// end foreach
    }
    
    public function test_create_exception():void {
        // Se trata de registrar una matricula repetida
        $matriculaData = [
            'idCurso' => 1,
            'idAlumno' => 1,
            'anioAcad' => '2024-I'
        ];

        // Verifica que si estaba la matricula registrada anteriormente
        $this->assertDatabaseHas('matriculas', [
            'idCurso' => $matriculaData['idCurso'],
            'idAlumno' => $matriculaData['idAlumno'],
            'anioAcad' => $matriculaData['anioAcad']
        ]);

        $response = $this->post(route('matriculas.store'), $matriculaData);
        $response->assertStatus(302);
        $response->assertSessionHas('mensaje');
        $response->assertSessionHas('tipo', 'danger');
    }
}
