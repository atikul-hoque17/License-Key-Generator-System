<?php
 

namespace App\Http\Controllers\Auth;  

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

  

class LoginController extends Controller

{ 

    use AuthenticatesUsers;
    protected $redirectTo = '/home';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

  

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)
    {   
        $input = $request->all();  

        $this->validate($request, [
            'mobile' => 'required',
            'password' => 'required',
        ]);
  

        $fieldType = filter_var($request->mobile, FILTER_VALIDATE_EMAIL) ?  : 'mobile';

        if(auth()->attempt(array($fieldType => $input['mobile'], 'password' => $input['password'])))

        {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')
            ->with('message','Email-Address And Password Are Wrong.');
        }
    }

}