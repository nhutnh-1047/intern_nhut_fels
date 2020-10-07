<?php

namespace Tests\Unit\Models;

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $role;

    protected function setUp(): void
    {
        parent::setUp();

        $this->role = factory(Role::class)->create();
        $this->user = factory(User::class)->create([
            'role_id' => $this->role->id,
        ]);

    }

    public function test_users_table_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'name',
                'email',
                'address',
                'phone',
                'avatar',
                'email_verified_at',
                'password',
                'remember_token',
                'created_at',
                'updated_at',
            ])
        );
    }

    public function test_contains_valid_fillable_properties()
    {
        $m = new User();
        $this->assertEquals([
            'name',
            'email',
            'password',
            'address',
            'phone',
            'role_id',
        ], $m->getFillable());
    }

    public function test_user_has_one_role()
    {
        $this->assertInstanceOf(Role::class, $this->user->role);
    }

    public function test_user_belongs_to_many_words()
    {
        $this->assertInstanceOf(Collection::class, $this->user->words);
    }

    public function test_user_belongs_to_many_activities()
    {
        $this->assertInstanceOf(Collection::class, $this->user->activities);
    }

    public function test_user_belongs_to_many_lessons()
    {
        $this->assertInstanceOf(Collection::class, $this->user->lessons);
    }
}
