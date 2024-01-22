<?php


namespace App\Repository;

class DataRepo
{
    public static function employee(): EmployeeRepository
    {
        return app(EmployeeRepository::class);
    }
}