<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    public function test_user_can_be_created(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users');
    }
    public function test_user_can_be_updated(): void
    {
        $user = User::factory()->create();

        $user->name = 'Updated User';
        $user->save();

        $this->assertDatabaseHas('users', ['name' => 'Updated User']);
    }
    public function test_user_can_be_deleted(): void
    {
        $user = User::factory()->create();

        $user->delete();

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
