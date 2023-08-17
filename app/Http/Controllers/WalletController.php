<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
class WalletController extends Controller
{
    public function addMoney(Request $request)
    {
        
         try {
            $user = Auth::user();
            $amount = $request->input('amount');
        
            // Validate input
            $request->validate([
                'amount' => 'required|numeric|min:3|max:100',
            ]);

            // Update user's wallet
            $user->wallet += $amount;
            $user->save();
           
            return response()->json(['status'=>true,'message' => 'Money added successfully']);
            
        }catch (ValidationException $e) {
            return response()->json(['status'=>false,'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            // Log error
            Log::error($e->getMessage());
            return response()->json(['status'=>false,'message' => 'An error occurred'], 500);
        }
    }
    
    public function buyCookie(Request $request)
    {
        
        try {
            $user = Auth::user();
            $cookiePrice = 1;
            
            // Validate input
            $request->validate([
                'quantity' => 'required|numeric|min:1',
            ]);

            $quantity = $request->quantity;
            $totalAmount = $quantity * $cookiePrice;

            // Check if user has sufficient funds
            if ($user->wallet < $totalAmount) {
                Log::error('Insufficient funds');
                return response()->json(['status'=>true,'message' => 'Insufficient funds'], 400);
            }
    
            // Update user's wallet
            $user->wallet -= $totalAmount;
            $user->save();
    
            return response()->json(['status'=>true,'message' => 'Cookie purchased successfully']);
        } catch (ValidationException $e) {
            return response()->json(['status'=>false,'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            // Log error
            Log::error($e->getMessage());
            return response()->json(['status'=>false,'message' => 'An error occurred'], 500);
        }
    }
    
}
