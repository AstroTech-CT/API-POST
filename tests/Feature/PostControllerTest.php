<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;

class PostControllerTest extends TestCase
{

  public function testGetPostsByCategory(){
    
    $category = 'tech';
    
    $response = $this->get("/publicacion/$category");

    $response->assertStatus(200)
             ->assertJsonStructure(['data' => ['*' => ['titulo', 'contenido']]]);
  }

  public function testStorePost() {
  
    $data = ['titulo' => 'Test Post', 'contenido' => 'Lorem ipsum'];
    $this->actingAs($user);

  
    $response = $this->post('/publicacion', $data);

   
    $response->assertStatus(201);
    $this->assertDatabaseHas('publicacion', ['titulo' => 'Test Post']);
  }
}
