<?php


namespace App\Repository;


class DataRepo
{
    public static function employee(): EmployeeRepository
    {
        return app(EmployeeRepository::class);
    }

    public static function department(): DepartmentRepository
    {
        return app(DepartmentRepository::class);
    }

    public static function role(): RoleRepository
    {
        return app(RoleRepository::class);
    }

    public static function permission(): PermissionRepository
    {
        return app(PermissionRepository::class);
    }
}