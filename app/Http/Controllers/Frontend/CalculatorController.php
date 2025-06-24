<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request,$id)
    {

        $initialPaymentPercent = (float) $request->initial_payment;
        $months = (int) $request->month;
        $product = Product::findOrFail($id);
        $price = $product->price;
        $initialPayment = ($initialPaymentPercent / 100) * $price;
        $remaining = $price - $initialPayment;

        $monthlyPayment = round($remaining / $months, 2);

        return response()->json([
            'monthly_payment' => number_format($monthlyPayment, 2, '.', ' ')
        ]);
    }
}
