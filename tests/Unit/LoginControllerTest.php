<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mockery;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $loginController;
    protected $authService;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the AuthService
        $this->authService = Mockery::mock(AuthService::class);
        $this->loginController = new LoginController($this->authService);
    }

    /** @test */
    public function it_should_login_successfully_with_valid_credentials()
    {
        // Create a user
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        // Define expected data
        $this->authService->shouldReceive('login')
            ->once()
            ->with(['email' => $user->email, 'password' => 'password'])
            ->andReturn([
                'user' => $user,
                'token' => 'fake-jwt-token'
            ]);

        // Mock the LoginRequest
        $request = Mockery::mock(LoginRequest::class);
        $request->shouldReceive('validated')
            ->once()
            ->andReturn([
                'email' => $user->email,
                'password' => 'password'
            ]);

        $response = $this->loginController->login($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('success', $data);
        $this->assertArrayHasKey('message', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals('Login successful', $data['message']);
        $this->assertEquals('fake-jwt-token', $data['data']['token']);
    }

    /** @test */
    public function it_should_return_error_for_invalid_credentials()
    {
        $this->authService->shouldReceive('login')
            ->once()
            ->with(['email' => 'invalid@example.com', 'password' => 'wrongpassword'])
            ->andThrow(new \Exception('Invalid credentials', 400));

        // Mock the LoginRequest
        $request = Mockery::mock(LoginRequest::class);
        $request->shouldReceive('validated')
            ->once()
            ->andReturn([
                'email' => 'invalid@example.com',
                'password' => 'wrongpassword'
            ]);

        $response = $this->loginController->login($request);

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertJson($response->getContent());
        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('success', $data);
        $this->assertArrayHasKey('message', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals('Invalid credentials', $data['message']);
    }
}
