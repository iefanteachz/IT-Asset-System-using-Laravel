<?php

namespace App\Http\Controllers\Asetofficer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect asetofficers when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/asetofficer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('asetofficer.auth');
    }

    /**
     * Display the password confirmation view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showConfirmForm()
    {
        return view('asetofficer.auth.passwords.confirm');
    }

    /**
     * Reset the password confirmation timeout.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('asetofficer.auth.password_confirmed_at', time());
    }

    /**
     * Get the password confirmation validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'password' => 'required|password:asetofficer',
        ];
    }
}