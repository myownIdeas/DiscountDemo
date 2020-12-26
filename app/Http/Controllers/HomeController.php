<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::all();
        return view('welcome')->with('customers',$customers);
    }

    public function home(Request $request){
        $request->session()->put('user_id',$request->get('user_id'));
       return redirect('/products');
    }

}
