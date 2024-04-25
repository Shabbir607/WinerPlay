<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index()
    {
        $sale = Subscription::countSubscription();
        $userData = User::calculateTodayUsers();
        $investmentData = Subscription::calculateTodayInvestment();
        $memberData = User::calculateNewMember();
        $totalInvestment = Subscription::getTotalInvestment();
        $items = Product::countActiveProduct();
//        $allUsers = User::getAllUsers();
        $allUsers = User::count();
        $Members = User::getMember();

        return view('index', ['investmentData' => $investmentData, 'userData' => $userData, 'memberData' => $memberData, 'totalInvestment' => $totalInvestment, 'totalUsers' => $allUsers,'items'=>$items])->with('sale', $sale)->with('members', $Members);
    }

    public function home()
    {

        $featured = Product::where('status', 'active')->where('is_featured', 1)->orderBy('price', 'DESC')->limit(2)->get();
        $products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $parentcategories = Category::where('status', 'active')->where('is_parent', 1)->limit(3)->get();

        $categories = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();
        $parent_cats = Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();

        return view('welcome')
            ->with('product_lists', $products)
            ->with('categories', $categories)
            ->with('filteredProducts', $products)
            ->with('parentcategories', $parentcategories);
    }

    public function productdetails(Request $request, $slug)
    {

        $parentcategories = Category::where('status', 'active')->where('is_parent', 1)->limit(3)->get();

        $product = Product::where('slug', $slug)->get();
        $product_id = Product::where('slug', $slug)->pluck('id')->first();
        $subscribe_product = Subscription::where('product_id', $product_id)->pluck('product_id')->first();
        $subscribe_user = Subscription::where('product_id', $product_id)->pluck('user_id')->count();
        return view('productDetails')->with('product', $product)->with('subscribe_product', $subscribe_product)->with('subscribe_user', $subscribe_user)->with('parentcategories', $parentcategories);
    }

    public function productList()
    {

        return view('productlist');

    }

    public function CategoryproductList(Request $request, $slug)
    {

        $categories = Category::where('status', 'active')->where('slug', $slug)->get();
        $title = Category::where('status', 'active')->where('slug', $slug)->pluck('title')->implode(', ');
        $parentcategories = Category::where('status', 'active')->where('is_parent', 1)->limit(3)->get();

        $products = Product::where('status', 'active')->get();
        return view('productlist')->with('title', $title)->with('parentcategories', $parentcategories);
    }

    public function watchList()
    {
        $title = "Watches";
        return view('backend.pages.dashboard')->with('title', $title);

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
            'supporter' => 'required',
        ]);


        $user = $this->create($validatedData);

        if ($user) {
            $request->session()->flash('success', 'Successfully registered');
            return view('login');
        } else {
            $request->session()->flash('error', 'Please try again!');
            return back();
        }
    }


    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active',
            'supporter' => $data['supporter']
        ]);
    }

}
