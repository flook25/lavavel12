<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
use App\Models\Employee; // Import Employee model

class EmployeeController extends Controller
{
    public function index(){
        // อ่านข้อมูลจากตาราง employees
        $employees = DB::table('employees')->get();

        // อ่านข้อมูลรายการเดียว จากตาราง employees
        $employees = DB::table('employees')->first(); // <-- Added semicolon here

        // อ่านข้อมูลพนนักงารที่มี id = 3
        $employees = DB::table('employees')->where('id', 3)->first();

        // อ่านข้อมูลพนักงานที่มี id = 3 และ status = 1
        $employees = DB::table('employees')->where('id', 3)->where('status', 0)->first();

        // อ่านข้อมูลพนักงานที่มี id = 3 หรือ status = 1
        $employees = DB::table('employees')->where('id', 3)->orWhere('status', 1)->first();

        // อ่านข้อมูลพนักงานที่มี id = 3 หรือ status = 1 และ fullname = 'John Doe'
        $employees = DB::table('employees')
            ->where([
                ['id',  3],
                ['status', 0]
            ])
            ->first();

        // orderBy
        $employees = DB::table('employees')
            ->orderBy('id', 'desc')
            ->get();

        
        // limit and offset
        $employees = DB::table('employees')
            ->skip(1)
            ->take(2)
            ->get();

        // like
        $employees = DB::table('employees')
            ->where('fullname', 'like', '%John%')
            ->get();
            
        // select specific columns
        $employees = DB::table('employees')
            ->select('fullname', 'email')
            ->get();
            
        //  between
        $employees = DB::table('employees')
            ->whereBetween('age', [25, 30])
            ->get();
        
        // min, max, avg, sum
        // $minAge = DB::table('employees')->min('age');
        // $maxAge = DB::table('employees')->max('age'); // Corrected syntax
        // $avgAge = DB::table('employees')->avg('age'); // Corrected syntax
        // $sumAge = DB::table('employees')->sum('age'); // Corrected syntax

        // age > 30
        $employees = DB::table('employees')
            ->where('age', '>', 30)
            ->get();

        

        
        // dump() แสดงข้อมูลแบบ Array
        // dump($employees);

        // dd() แสดงข้อมูลแบบ Array และหยุดการทำงานของโปรแกรม
        // dd($employees);
        // dd($employees->toArray());

        // var_dump() แสดงข้อมูลแบบ Array
        // var_dump($employees);
        // var_dump($employees->toArray());


        // print_r() แสดงข้อมูลแบบ Array
        // print_r($employees);
        // echo "<pre>";
        // print_r($employees->toArray());
        // echo "</pre>";

        // JSON Response
        // return response()->json(['min_age' => $minAge]);
        return response()->json($employees);
        // Log::info('Employee data retrieved successfully', $employees->toArray());


        // This return statement will not be reached because of the previous return statement.
        // return "OK finish";
    }

    public function employeelist(){

                // อ่านข้อมูลทั้งหมด จากตาราง employees
        $employees = Employee::all(); // select * from employees

        // อ่านข้อมูลรายการเดียว จากตาราง employees
        $employees = Employee::first(); // select * from employees limit 1

        // อ่านข้อมูลพนักงานที่มี id = 3
        $employees = Employee::find(3); // select * from employees where id = 3

        // อ่านข้อมูลพนักงานที่มี id = 3 และ name = 'John'
        $employees = Employee::where('id', 3)->where('fullname', 'Michael Smith')->first(); // select * from employees where id = 3 and fullname = 'John'

        // อ่านข้อมูลพนักงานที่มี id = 3 หรือ name = 'John'
        $employees = Employee::where('id', 3)->orWhere('fullname', 'Michael Wong')->first(); // select * from employees where id = 3 or fullname = 'John'

         // อ่านข้อมูลพนักงานที่มี id = 3 และ name = 'John'
         $employees = Employee::where([
            ['id', 3],
            ['fullname', 'Michael Smith']
        ])->first();

        // orderBy
        $employees = Employee::orderBy('id', 'desc')->get(); // แสดงข้อมูลจากตาราง employees โดยเรียงลำดับจากมากไปน้อย

        // limit และ offset
        $employees = Employee::skip(1)->take(2)->get(); // แสดงข้อมูลที่ 2 และ 3 จากตาราง employees

        // like
        $employees = Employee::where('fullname', 'like', '%John%')->get(); // แสดงข้อมูลที่มีชื่อ John จากตาราง employees

        // select
        $employees = Employee::select('id', 'fullname')->get(); // แสดงข้อมูลเฉพาะ id และ fullname จากตาราง employees

        // between
        $employees = Employee::whereBetween('id', [1, 3])->get(); // แสดงข้อมูลที่มี id ระหว่าง 1 ถึง 3 จากตาราง employees

        // min, max, avg, sum
        $employees = Employee::min('age');  // แสดงอายุน้อยที่สุดจากตาราง employees
        $employees = Employee::max('age');  // แสดงอายุมากที่สุดจากตาราง employees
        $employees = Employee::avg('age');  // แสดงอายุเฉลี่ยจากตาราง employees
        $employees = Employee::sum('age');  // แสดงผลรวมอายุจากตาราง employees

        // อ่านข้อมูลพนักงานทั้งหมด
        $employees = Employee::all();

        //  JSON Response
        // return response()->json($employees);

        // return "OK จบการทำงาน";

        // print_r(compact('employees'));

        // Return View
        return view('employees', compact('employees'));
    }
}
