<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ChangeAccountInformationController extends Controller
{
    function ChangeAccountInformationIndex()
    {   
        if(session('verified'))
        {
            return view('change_account_information');
        }
        else
        {
            return view('verifyAccount');
        }
    }

    function changeEmail(Request $request)
    {

    }

    function changePassword(Request $request)
    {

    }

    function changeUsername(Request $request)
    {

    }
}
