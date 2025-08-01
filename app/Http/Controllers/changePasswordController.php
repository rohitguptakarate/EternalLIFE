<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class changePasswordController extends Controller
{
    //
    public function showPassword()
    {
        return view('settingpages/changePassword');
    }


    // update password 
    public function updatePassword(Request $request)
    {
        $user = session('loggedInUser');
        $getUserData = User::where('id', $user->id)->first();

        // Step 1: Validate request
        $request->validate(
            [
                'oldPassword' => 'required',
                'changePassword' => 'required|min:5',
                'confirmPassword' => 'required|same:changePassword',
            ]
        );

        if ($getUserData) {
            if (Hash::check($request->oldPassword, $getUserData->password)) {
                // Step 4: Update password
                $getUserData->password = Hash::make($request->changePassword);
                $getUserData->save();

                return redirect()->route('show.Password')->with('success', 'Password updated successfully!');
            } else {
                return redirect()->route('show.Password')->with('error', 'Invalid Old Password');
            }
        }
    }

    // our logic ->
    // here to start with secction 
    // Step 3: Check if old password matches
    // if (Hash::check($request->oldPassword, $getUsers->password)) {
    //     return "succes fully update";
    //     // Step 4: Update password
    //     // $getUsers->password = Hash::make($request->changePassword);
    //     // $getUsers->save();

    //     return redirect('/change-password')->with('success', 'Password updated successfully!');
    // } else {
    //     return redirect('/change-password')->with('error', 'Invalid Old Password');
    // }


    // we mannually store hased password 
    // public function insertUser()
    // {
    //     User::create([
    //         'name' => 'Admin',
    //         'email' => 'admin2@example.com',
    //         'password' => Hash::make('121212'),
    //     ]);

    //     return "User created using Eloquent!";
    // }



    // public function storeSampleItems()
    // {    
    //     // Step 1: Create a new item
    //     Items::create(  
    //     [
    //         'name' => 'Cheese Burst',
    //         'price' => 350.00,
    //         'description' => 'Cheesy layered pizza with extra toppings',
    //         'category_id' => 1,
    //         'subcategory_id' => 2,
           
    //         'interstate' => 6.00,
    //         'intrastate' => 5.00,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);
    //     return "Store data of items";

    // }






    // $request ->    {
    //   "_token": "f2qLU7UDw46neK0ZSTlWVfUuxG6svyeo7fFuCn1h",
    //   "oldPassword": "12345",
    //   "changePassword": "54321",
    //   "confirmPassword": "54321"
    // }


}