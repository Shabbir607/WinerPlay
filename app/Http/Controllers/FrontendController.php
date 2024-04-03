<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    public function home()
    {

        $featured = Product::where('status', 'active')->where('is_featured', 1)->orderBy('price', 'DESC')->limit(2)->get();
        $products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $subcategories = Category::where('status', 'active')->where('is_parent', 0)->get();
        $categories = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();

//        dd($products);
        return view('welcome')

            ->with('product_lists', $products)
            ->with('categories', $categories)
            ->with('filteredProducts', $products);
    }


    public function login()
    {

        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])) {
            Session::put('user', $data['email']);
            request()->session()->flash('success', 'Successfully login');

            // Check if the user is authenticated and redirect to the appropriate route
            if (Auth::check()) {
                return redirect('/');
            }
        } else {
            request()->session()->flash('error', 'Invalid email and password, please try again!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();

        return back();
    }


    public function registerSubmit(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = $this->create($validatedData);

        // Check if the user creation was successful
        if ($user) {
            // Flash a success message to the session
            $request->session()->flash('success', 'Successfully registered');
            // Redirect the user to the home page
            return view('login');
        } else {
            // Flash an error message to the session
            $request->session()->flash('error', 'Please try again!');
            // Redirect the user back to the registration form
            return back();
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active' // Assuming you have a 'status' field in your users table
        ]);
    }

}
