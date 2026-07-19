<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_matrix_page_loads(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)->get(route('role.permission.list'))->assertStatus(200);
    }

    public function test_permission_crud(): void
    {
        $user = $this->createUser();

        $store = $this->actingAs($user)->post(route('permission.store'), ['name' => 'edit articles']);
        $store->assertRedirect(route('role.permission.list'));
        $permission = Permission::where('name', 'edit articles')->firstOrFail();

        $update = $this->actingAs($user)->put(route('permission.update', $permission), ['name' => 'edit posts']);
        $update->assertRedirect(route('role.permission.list'));
        $this->assertSame('edit posts', $permission->fresh()->name);

        $destroy = $this->actingAs($user)->delete(route('permission.destroy', $permission));
        $destroy->assertRedirect(route('role.permission.list'));
        $this->assertDatabaseMissing('permissions', ['id' => $permission->id]);
    }

    public function test_role_crud(): void
    {
        $user = $this->createUser();

        $store = $this->actingAs($user)->post(route('role.store'), ['name' => 'editor', 'status' => '1']);
        $store->assertRedirect(route('role.permission.list'));
        $role = Role::where('name', 'editor')->firstOrFail();
        $this->assertSame('Active', $role->status);

        $update = $this->actingAs($user)->put(route('role.update', $role), ['name' => 'senior editor', 'status' => '0']);
        $update->assertRedirect(route('role.permission.list'));
        $role->refresh();
        $this->assertSame('senior editor', $role->name);
        $this->assertSame('Inactive', $role->status);

        $destroy = $this->actingAs($user)->delete(route('role.destroy', $role));
        $destroy->assertRedirect(route('role.permission.list'));
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    public function test_assigning_permission_to_role_via_the_matrix(): void
    {
        $user = $this->createUser();
        $permission = Permission::create(['name' => 'edit articles', 'guard_name' => 'web']);
        $role = Role::create(['name' => 'editor', 'status' => 'Active', 'guard_name' => 'web']);

        $response = $this->actingAs($user)->post(route('role.permission.store'), [
            'permission' => [
                'edit articles' => ['editor'],
            ],
        ]);

        $response->assertRedirect(route('role.permission.list'));
        $this->assertTrue($role->fresh()->hasPermissionTo($permission));
    }

    public function test_unchecking_a_permission_revokes_it(): void
    {
        $user = $this->createUser();
        $permission = Permission::create(['name' => 'edit articles', 'guard_name' => 'web']);
        $role = Role::create(['name' => 'editor', 'status' => 'Active', 'guard_name' => 'web']);
        $role->givePermissionTo($permission);

        $response = $this->actingAs($user)->post(route('role.permission.store'), [
            'permission' => [],
        ]);

        $response->assertRedirect(route('role.permission.list'));
        $this->assertFalse($role->fresh()->hasPermissionTo($permission));
    }
}
