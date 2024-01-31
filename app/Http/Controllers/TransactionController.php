<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Bank;

class TransactionController extends Controller
{
    public function showForm()
    {
        $transactions = Transaction::all();
        return view('dashboard', ['transactions' => $transactions]);
    }

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

            // $lastId = Transaction::max('id');
            // $nextStatusId = str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);

            // $transaction->status_id = $nextStatusId;
            $transaction->status_id = rand(1, 3);
            $transaction->save();

            $bank = new Bank();
            $bank->status_id = $transaction->status_id;
            $bank->save();

            DB::commit();

            return redirect('/dashboard')->with('success', 'Transaction submitted successfully!');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dashboard')->with('error', 'Error submitting transaction. Please try again.');
        }
    }
}
