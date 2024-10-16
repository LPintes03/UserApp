<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAllUsers()
    {
        $users = User::orderBy('updated_at', 'desc')->get();
        return view('users', ['users' => $users]);
    }

    public function createUser()
    {
        return view('create-user');
    }

    public function storeUser (Request $request)
    {
       
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|date',
            'status' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255', // Consider minimum length for security
        ]);
    
        // Create a new user instance with validated data
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->birthdate = $validatedData['birthdate'];
        $user->status = $validatedData['status'];
        $user->address = $validatedData['address'];
        $user->contact_number = $validatedData['contact_number'];
        $user->password = Hash::make($validatedData['password']); // Hash the password
        $user->save(); // Save the user to the database
    
        // Redirect with success message
        return redirect()->route('showAllUsers')->with('success', 'User Created Successfully');
    }

    public function viewUser(Request $request){
        $user = User::find($request->id);
        return view('user', ['user' => $user]);
    }

    public function editUser(Request $request){
        $user = User::find($request->id);
        return view('edit-user', ['user' => $user]);
    }

    public function updateUser(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|date',
            'status' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255', // Consider minimum length for security
        ]);

        $user = User::find($request->id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->birthdate = $validatedData['birthdate'];
        $user->status = $validatedData['status'];
        $user->address = $validatedData['address'];
        $user->contact_number = $validatedData['contact_number'];
        $user->password = Hash::make($validatedData['password']); // Hash the password
        $user->save();

        return redirect()->route('viewUser', ['id' =>$user->id])->with('success', 'User Updated Successfully');

    }

    public function deleteUser(Request $request){

        $user = User::find($request->id);

        if ($user){
            $user->delete();
        }

        return redirect()->route('showAllUsers')->with('success', 'User Deleted Successfully');
    }

}
