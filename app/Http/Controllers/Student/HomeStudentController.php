<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
class HomeStudentController extends Controller
{
    public function viewPaymentHistory(Student $student)
    {
        $payments = $student->payments()->with('course')->orderBy('created_at', 'desc')->get();

        return view('payment_history', [
            'payments' => $payments,
        ]);
    }

}
