<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.show');
    }
//     use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class AddProfileFieldsToUsersTable extends Migration
// {
//     public function up()
//     {
//         Schema::table('users', function (Blueprint $table) {
//             $table->string('address')->nullable();
//             $table->string('gender')->nullable();
//             $table->string('profile_image')->nullable();
//             $table->date('date_of_birth')->nullable();
//             $table->string('phone_number')->nullable();
//             $table->string('website')->nullable();
//             $table->text('bio')->nullable();
//             $table->string('profession')->nullable();
//             $table->string('interests')->nullable();
//             $table->string('location')->nullable();
//             $table->string('facebook')->nullable();
//             $table->string('twitter')->nullable();
//             $table->string('instagram')->nullable();
//             $table->string('linkedin')->nullable();
//         });
//     }

//     public function down()
//     {
//         Schema::table('users', function (Blueprint $table) {
//             $table->dropColumn(['address', 'gender', 'profile_image', 'date_of_birth', 'phone_number', 'website', 'bio', 'profession', 'interests', 'location', 'facebook', 'twitter', 'instagram', 'linkedin']);
//         });
//     }
// }
// 
}
