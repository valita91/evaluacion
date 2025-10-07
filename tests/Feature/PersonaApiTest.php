<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Persona;

class PersonaApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
     use RefreshDatabase;

    public function test_crear_y_eliminar_persona()
    {
        $response = $this->postJson('/api/personas', [
            'nombre' => 'Ana',
            'apellido' => 'Pérez',
            'telefono' => '099111222'
        ]);

        $response->assertStatus(201); 

        $this->assertDatabaseHas('personas', ['nombre' => 'Ana']);

        $id = $response['data']['id'] ?? null;

        if ($id) {
            $this->deleteJson("/api/personas/{$id}")
                 ->assertStatus(204);
            $this->assertSoftDeleted('personas', ['id' => $id]);
        }
    }
}
