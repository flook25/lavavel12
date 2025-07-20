<?php

namespace App\Models;

// Trat คือ classที่ใช้สำหรับการทำงานกับฐานข้อมูล และ เพิ่ม Method ที่ใช้ในการจัดการข้อมูลพนักงาน
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees'; // กำหนดชื่อตารางที่ใช้ในฐานข้อมูล
    protected $primaryKey = 'id'; // กำหนด Primary Key ของตาราง
    public $timestamps = false; // ปิดการใช้งาน timestamps (created_at, updated_at)
    public $fillable = [
        'fullname',
        'gender',
        'email',
        'tel',
        'age',
        'address',
        'avatar',
        'status'
    ]; // กำหนดฟิลด์ที่สามารถกรอกข้อมูลได้  
}
