<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MeTest extends TestCase
{
    private const URL = '/api/me';

    /**
     * @return void
     */
    public function test_me_未認証()
    {
        $response = $this->json('GET', self::URL);
        $response->assertStatus(401);
    }

    public function test_me_成功()
    {
        $user = factory(\App\User::class)->create();
        Sanctum::actingAs($user);
        $response = $this->json('GET', self::URL);
        $response
            ->assertStatus(200)
            ->assertJsonPath('id', $user->id)
        ;
    }
}
