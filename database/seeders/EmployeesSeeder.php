<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('employees')->insert([
    [
        'fullname' => 'John Doe',
        'gender' => 'Male',
        'email' => 'john@example.com',
        'tel' => '0812345678',
        'age' => 30,
        'address' => '123 Main St, City, Country',
        'avatar' => 'https://example.com/avatar1.jpg',
        'status' => 1
    ],
    [
        'fullname' => 'Jane Smith',
        'gender' => 'Female',
        'email' => 'jane@example.com',
        'tel' => '0898765432',
        'age' => 25,
        'address' => '456 Oak Ave, Town, Country',
        'avatar' => 'https://example.com/avatar2.jpg',
        'status' => 1
    ],
    [
        'fullname' => 'Michael Johnson',
        'gender' => 'Male',
        'email' => 'michael@example.com',
        'tel' => '0855512345',
        'age' => 35,
        'address' => '789 Pine Ln, Village, Country',
        'avatar' => 'https://example.com/avatar3.jpg',
        'status' => 0 // Example: inactive status
    ],
    [
        'fullname' => 'Emily White',
        'gender' => 'Female',
        'email' => 'emily@example.com',
        'tel' => '0877799887',
        'age' => 28,
        'address' => '101 Birch Rd, Hamlet, Country',
        'avatar' => 'https://example.com/avatar4.jpg',
        'status' => 1
    ],
    [
        'fullname' => 'David Lee',
        'gender' => 'Male',
        'email' => 'david@example.com',
        'tel' => '0833322110',
        'age' => 42,
        'address' => '222 Cedar Cl, Borough, Country',
        'avatar' => 'https://example.com/avatar5.jpg',
        'status' => 1
    ]
]);
    }
}
