<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Role;
use App\Models\Core\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class PermissionController extends Controller
{
    /**
     * @return Response Inertia Render Response
     */
    public function render_roles(): Response
    {
        return Inertia::render('Permissions/Roles/Overview', [
            'roles' => Role::withCount('permissions')->paginate(15),
            'guards' => array_keys(config('auth.guards'))
        ]);
    }

    /**
     * @return Response Inertia Render Response
     */
    public function render_role_details_settings(Role $role): Response
    {
        return Inertia::render('Permissions/Roles/DetailPages/Settings', [
            'role' => $role->with('permissions')->firstOrFail()
        ]);
    }

    /**
     * @return Response Inertia Render Response
     */
    public function render_role_details_access(Role $role): Response
    {
        return Inertia::render('Permissions/Roles/DetailPages/Access', [
            'role' => $role->with('permissions')->firstOrFail()
        ]);
    }

    /**
     * @return Response Inertia Render Response
     */
    public function render_role_details_notifications(Role $role): Response
    {
        return Inertia::render('Permissions/Roles/DetailPages/Notifications', [
            'role' => $role->with('permissions')->firstOrFail()
        ]);
    }

    /**
     * @return Response Inertia Render Response
     */
    public function render_role_details_integrations(Role $role): Response
    {
        return Inertia::render('Permissions/Roles/DetailPages/Integrations', [
            'role' => $role->with('permissions')->firstOrFail()
        ]);
    }

    /**
     * @return Response Inertia Render Response
     */
    public function render_permissions(): Response
    {
        return Inertia::render('Permissions/Permissions/Overview', [
            'permissions' => Permission::withCount('roles')->paginate(15)
        ]);
    }

    /**
     * @return Response Inertia Render Response
     */
    public function render_permission_details(): Response
    {
        return Inertia::render('Permissions/Permissions/Detail');
    }

    /**
     * Create Role from modal
     * @param Request $request
     * @return RedirectResponse
     */
    public function create_role(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => ['required', 'string', Rule::in(array_keys(config('auth.guards')))],
            'description' => 'nullable|string|max:1500'
        ]);

        $role = Role::make($request->all());
        $role->save();

        return back();
    }

    public function update_role() {}

    /**
     * Delete single role by id
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete_role_single(Request $request): RedirectResponse
    {
        $request->validate([
           'role' => 'required|int|exists:roles,id'
        ]);

        $role = Role::findOrFail($request->role);
        $role->delete();

        return back();
    }

    /**
     * Delete array of roles
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete_role_array(Request $request): RedirectResponse
    {
        $request->validate([
           'roles' => 'required|array',
           'roles.*' => 'required|int|exists:roles,id'
        ]);

        foreach ($request->roles as $role) {
            $role = Role::findOrFail($role);
            $role->delete();
        }

        return back();
    }

    public function attach_permission_on_role() {}
    public function detach_permission_on_role() {}
}
