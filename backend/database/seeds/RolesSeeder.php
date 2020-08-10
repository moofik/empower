<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesSeeder extends Seeder
{
    public function run()
    {
        $permissionRoleList = Permission::create(['name' => 'list roles']);
        $permissionRoleCreate = Permission::create(['name' => 'create role']);
        $permissionRoleEdit = Permission::create(['name' => 'edit role']);
        $permissionRoleDelete = Permission::create(['name' => 'delete role']);
        $permissionShopList = Permission::create(['name' => 'list workshops']);
        $permissionShopView = Permission::create(['name' => 'view workshop']);
        $permissionShopCreate = Permission::create(['name' => 'create workshop']);
        $permissionShopEdit = Permission::create(['name' => 'edit workshop']);
        $permissionShopDelete = Permission::create(['name' => 'delete workshop']);
        $permissionItemRepairList = Permission::create(['name' => 'list repair requests']);
        $permissionItemRepairCreate = Permission::create(['name' => 'create repair request']);
        $permissionItemRepairRespond = Permission::create(['name' => 'respond repair request']);
        $permissionItemRepairEdit = Permission::create(['name' => 'edit repair request']);
        $permissionItemRepairDelete = Permission::create(['name' => 'delete repair request']);
        $permissionImpersonateUser = Permission::create(['name' => 'impersonate user']);
        $permissionAdminUsersCreate = Permission::create(['name' => 'create admin user']);
        $permissionAdminUsersView = Permission::create(['name' => 'view admin user']);
        $permissionAdminUsersDelete = Permission::create(['name' => 'delete admin user']);
        $permissionAdminUsersEdit = Permission::create(['name' => 'edit admin user']);

        /** @var Role $roleWorkshop */
        $roleWorkshop = Role::create(['name' => 'workshop']);
        /** @var Role $roleUser */
        $roleUser = Role::create(['name' => 'user']);
        /** @var Role $roleAdmin */
        $roleAdmin = Role::create(['name' => 'admin']);
        /** @var Role $roleGuest */
        $roleGuest = Role::create(['name' => 'guest']);
        /** @var Role $roleModerator */
        $roleModerator = Role::create(['name' => 'moderator']);

        $roleWorkshop->givePermissionTo(
            $permissionItemRepairList,
            $permissionItemRepairRespond,
            $permissionShopView,
            $permissionShopCreate,
            $permissionShopEdit,
            $permissionShopDelete
        );

        $roleUser->givePermissionTo(
            $permissionItemRepairCreate,
            $permissionItemRepairEdit,
            $permissionItemRepairDelete,
            $permissionShopList,
            $permissionShopView
        );

        $roleAdmin->givePermissionTo(
            $permissionRoleList,
            $permissionRoleCreate,
            $permissionRoleEdit,
            $permissionRoleDelete,
            $permissionAdminUsersCreate,
            $permissionAdminUsersDelete,
            $permissionAdminUsersEdit,
            $permissionAdminUsersView,
            $permissionShopList,
            $permissionShopView,
            $permissionShopCreate,
            $permissionShopEdit,
            $permissionShopDelete,
            $permissionItemRepairList,
            $permissionItemRepairCreate,
            $permissionItemRepairDelete,
            $permissionItemRepairEdit,
            $permissionImpersonateUser
        );

        $roleModerator->givePermissionTo(
            $permissionShopList,
            $permissionShopView,
            $permissionShopCreate,
            $permissionShopEdit,
            $permissionShopDelete,
            $permissionItemRepairList,
            $permissionItemRepairCreate,
            $permissionItemRepairDelete,
            $permissionItemRepairEdit
        );
    }
}
