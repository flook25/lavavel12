<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;

// เรียกใช้งาน Controller ชื่อ HomeController และเรียกใช้ Method ชื่อ showprofile
// แบบที่ 1
// Route::get('profile', 'App\Http\Controllers\HomeController@showprofile');

// แบบที่ 2
// Home Controller
Route::get('profile', [HomeController::class, 'showprofile']);
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

// Employee Controller
Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employeelist', [EmployeeController::class, 'employeelist'])->name('employees.employeelist');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');

// ------------------------------
// Basic Route
// ------------------------------

// Welcome
// GET http://localhost:8000/
Route::get('/', function () {
    return view('welcome');
});

// About
// GET http://localhost:8000/about
// Route::get('about', function () {
//     return 'About Us';
// });

// Contact
// GET http://localhost:8000/contact
// Route::get('contact', function () {
//     return 'Contact Us';
// });

// ------------------------------
// Route Parameters
// ------------------------------
// http://localhost:8000/user/1
Route::get('user/{id}', function ($id) {
    return 'User ID: ' . $id;
});

// http://localhost:8000/posts/1/comments/2
Route::get('posts/{post}/comments/{comment}', function ($postID, $commentID) {
    return 'Post:' . $postID . '<br>Comment:' . $commentID;
});

// Optional Parameters
// http://localhost:8000/member/John
Route::get('member/{name?}', function ($name = 'Guest') {
    return 'Hello ' . $name;
});

// Regular Expression Constraints
// http://localhost:8000/group/123
Route::get('group/{id}',function($id){
    return $id;
})->where('id','[A-Za-z0-9]+');

// ------------------------------
// Named Routes
// ------------------------------
// http://localhost:8000/guest/showroom/data/John
Route::get('guest/showroom/data/{name?}',function($name='Guest'){
    // return'Hello '.$name;
    // return 'Hello '.$name;
    return view('welcome', ['myname' => $name]);
})->name('guestprofile');


// ------------------------------
// Route post,put,delete
// ------------------------------
// http://localhost:8000/user/profile
// method: POST
Route::post('user/profile',function(){
    return 'Post Method';
});

// http://localhost:8000/user/profile
// method: PUT
Route::put('user/profile',function(){
    return 'Put Method';
});

// http://localhost:8000/user/profile
// method: DELETE
Route::delete('user/profile',function(){
    return 'Delete Method';
});


// ------------------------------
// Route Group
// ------------------------------
// http://localhost:8000/admin/dashboard
// http://localhost:8000/admin/profile
Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('dashboard',function(){
        return 'Admin Dashboard';
    })->name('dashboard');
    Route::get('profile',function(){
        return 'Admin Profile';
    })->name('profile');
});

// admin.dashboard
// admin.profile