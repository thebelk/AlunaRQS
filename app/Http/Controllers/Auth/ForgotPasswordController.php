<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
	public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function username(){ 
		return 'usuario';
	}
	
	public function sendResetLinkEmail(Request $request)
	{
		$this->validate($request, ['usuario' => 'required'], ['usuario.required' => 'Por favor digite su usuario.']);
	
		$response = $this->broker()->sendResetLink(
			$request->only('usuario')
		);
	
		if ($response === Password::RESET_LINK_SENT) {
			return back()->with('status', trans($response));
		}
	
		return back()->withErrors(
			['usuario' => trans($response)]
		);
	}
	
}
