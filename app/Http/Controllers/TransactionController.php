<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'amount' => 'required', 'numeric',
            'description' => 'nullable', 'string',
        ]);

        try {
            DB::beginTransaction();

            $transaction = new Transaction();
            $transaction->amount = $request->input('amount');
            $transaction->description = $request->input('description');
            $transaction->save();

            DB::commit();

            return redirect('/dashboard')->with('success', 'Transaction submitted successfully!');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dashboard')->with('error', 'Error submitting transaction. Please try again.');
        }
    }
}
