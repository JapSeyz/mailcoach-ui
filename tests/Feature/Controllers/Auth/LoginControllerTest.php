<?php

namespace Spatie\MailcoachUi\Tests\Feature\Controllers\Auth;

use Spatie\MailcoachUi\Http\Auth\Controllers\LoginController;
use Spatie\MailcoachUi\Models\User;
use Spatie\MailcoachUi\Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /** @var \Spatie\MailcoachUi\Models\User */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => bcrypt('my-password'),
        ]);
    }

    /** @test */
    public function it_can_login()
    {
        $this->post(
            action([LoginController::class, 'login']),
            [
                'email' => 'john@example.com',
                'password' => 'my-password',
            ]
        )
            ->assertRedirect('/campaigns');

        $this->assertAuthenticatedAs($this->user);
    }

    /** @test */
    public function it_will_not_login_when_providing_a_wrong_password()
    {
        $this->withExceptionHandling();

        $this
            ->post(action([LoginController::class, 'login']), [
                'email' => 'john@example.com',
                'password' => 'wrong-password',
            ])
            ->assertSessionHasErrors('email');

        $this->assertFalse($this->isAuthenticated());
    }
}
