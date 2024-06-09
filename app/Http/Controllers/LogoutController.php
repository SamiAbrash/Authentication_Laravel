<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
    
        return response()->json([
            'message' => 'You have logged out successfully.',
            'username' => $user->username
        ], 200);
    }
    
    
}
