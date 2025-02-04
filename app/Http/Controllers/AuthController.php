<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        return view('auth.login');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {

        return view('auth.registration');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $request->validate([

            'username' => 'required',

            'password' => 'required',

        ]);



        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')

                ->withSuccess('You have Successfully loggedin');
        }



        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

        ]);



        $data = $request->all();

        $check = $this->create($data);



        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {
        echo "dashboard";
        // if (Auth::check()) {

        //     return view('dashboard');
        // }



        // return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function products()
    {
        $this->authorize('view-product');

        echo "products";

        // if (Auth::check()) {

        //     return view('products');
        // }



        // return redirect("login")->withSuccess('Opps! You do not have access');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make($data['password'])

        ]);
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout()
    {

        Session::flush();

        Auth::logout();



        return Redirect('/');
    }
}
