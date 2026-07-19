<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function createUser(array $overrides = []): User
    {
        return User::create(array_merge([
            'username' => 'testuser'.uniqid(),
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test'.uniqid().'@example.com',
            'phone_number' => '0100000000',
            'user_type' => 'admin',
            'password' => bcrypt('password'),
        ], $overrides));
    }
}
