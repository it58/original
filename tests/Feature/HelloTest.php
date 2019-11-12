<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;
use App\User;

class HelloTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->assertTrue(true);
        
        // $response = $this->get('/');
        // $response->assertStatus(200);
        
        // $response = $this->get('/users');
        // $response->assertStatus(302);
        
        // $user = factory(User::class)->create();
        // $response = $this->actingAs($user)->get('/users');
        // $response->assertStatus(200);

        // $response = $this->get('/no_route');
        // $response->assertStatus(404);
        
        factory(User::class)->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'strength'=> '10級',
            'tactics'=> '角換わり',
            'password' => 'ABCABC'
        ]);
        factory(User::class,10)->create();
        
        $this->assertDatabaseHas('users',[
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'strength'=> '10級',
            'tactics'=> '角換わり',
            'password' => 'ABCABC'
        ]);
    }
}
