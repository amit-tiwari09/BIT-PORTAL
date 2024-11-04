<?php

namespace App\Http\Controllers;

use App\Payment;
use App\FeeStructure;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Student;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Show the payment form
    public function create($semester)
    {
        $feeStructure = FeeStructure::where('department', Auth::guard('student')->user()->department)->first();
        return view('payments.create', compact('feeStructure', 'semester'));
    }


    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_structure_id' => 'required|exists:fee_structures,id',
            'amount' => 'required|numeric',
            'semester' => 'required|integer|min:1|max:6',
            'payment_method_id' => 'required' // Update to use payment_method_id instead of stripeToken
        ]);

        // Set the Stripe API key
        \Stripe\Stripe::setApiKey('sk_test_51QGxsNJEFieUJXaxI1m1zZMN02Vh3zMWE2R12QeCKoutN7GHcxEdbhfkN01W2NX2c8QVO9xEF1hgxA5TyDEGqQa7006baKD1VT');

        try {
            // Create a PaymentIntent
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount * 100, // Amount in cents
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('payments.status') // Specify a route to return after the payment
            ]);

            $semester = $request->semester;

            // Store the payment details in the database
            Payment::create([
                'student_id' => $request->student_id,
                'fee_structure_id' => $request->fee_structure_id,
                'amount' => $request->amount,
                'payment_date' => now(),
                'transaction_id' => $paymentIntent->id,
                'semester' => $semester,
            ]);

            return redirect()->route('payments.status')->with('success', 'Payment successful!');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other errors
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }



    // Display the payment status
    public function status()
    {
        $payments = Payment::where('student_id', Auth::guard('student')->user()->id)->get();
        return view('payments.status', compact('payments'));
    }

    public function staffStatus()
    {

        $students = Student::with('payments')->get();
        $usdToNprRate = 100;
        return view('payments.index2', compact('students', 'usdToNprRate'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $students = Student::with('payments')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        $totalPaid = 0; // Initialize total paid

        foreach ($students as $student) {
            $totalPaid += $student->payments->sum('amount'); // Sum all payments
        }

        return response()->json([
            'data' => $students,
            'total_paid' => $totalPaid // Include total paid in response
        ]);
    }
}
