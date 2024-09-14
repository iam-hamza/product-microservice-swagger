<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProductControllerAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

       
    }

    /**
     * Test that an unauthenticated user cannot access product routes.
     *
     * @return void
     */
    public function test_authentication()
    {
        // Test unauthenticated access
      // Test unauthenticated access with JSON header
      $response = $this->withHeaders([
        'Accept' => 'application/json',
    ])->get('/api/products');

        $response->assertStatus(401); // Expect a 401 Unauthorized response
        $response->assertJson([
            'success' => false,
            'message' => 'Please Login First',
            'status_code' => 401
        ]);
    }

    /**
     * Test that an authenticated user without proper authorization cannot access product routes.
     *
     * @return void
     */
    public function test_authorization()
    {
        // Create a user without the 'admin' role
        $user = User::factory()->create();
        Sanctum::actingAs($user); // Authenticate as this user

        // Test access without proper authorization
        $response = $this->get('/api/products');

        $response->assertStatus(403); // Expect a 403 Forbidden response
        $response->assertJson([
            'success' => false,
            'message' => 'You do not have permission to perform this action',
            'status_code' => 403
        ]);
    }

    /**
     * Test that an authenticated user with the proper role can access product routes.
     *
     * @return void
     */
    public function test_authorization_with_proper_role()
    {
        // Create a user
        $admin = User::factory()->create();

        // Fetch or create the 'admin' role
        $adminRole = Role::firstOrCreate(['name'=>'Admin','slug' => 'admin']);

        // Attach the role to the user
        $admin->roles()->attach(Role::where('slug', 'admin')->first());

        // Authenticate as this admin user
        Sanctum::actingAs($admin);

        // Test access with proper role
        $response = $this->getJson('/api/products');
        $response->assertStatus(200); // Expect a 200 OK response
    }
}
