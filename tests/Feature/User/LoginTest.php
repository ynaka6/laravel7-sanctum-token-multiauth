<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    private const URL = '/api/login';

    /**
     * @return void
     */
    public function test_login_パラメータなし()
    {
        $response = $this->json('POST', self::URL);
        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_login_パスワード間違え()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->json('POST', self::URL, ['email' => $user->email, 'password' => 'test']);
        $response
            ->assertStatus(404)
        ;
    }

    /**
     * @return void
     */
    public function test_login_成功()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->json('POST', self::URL, ['email' => $user->email, 'password' => 'password']);
        $response
            ->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJsonPath('user.id', $user->id)
        ;
    }
}
