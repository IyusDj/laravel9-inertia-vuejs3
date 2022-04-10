<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return Inertia::render('Auth/Login');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        /**
         * validate request
         */
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        // Get email and password from request
        $data = $request->only('email', 'password');

        // Attempt to login
        if (Auth::attempt($data)) {

            // Regenerate session
            $request->session()->regenerate();

            // Redirect route to dashboard
            return redirect('/dashboard');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
