<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $bal = Transaction::where('user_id', $user->id);
        if (Transaction::where('user_id',$user->id)->count()) {
            $balance = (clone $bal)->latest('created_at')->first();
            $balance = number_format((float) $balance->balance, 2, '.', '');
        } else {
            $balance = 0;
        }

        $transactions = (clone $bal)->get();
        return view('body.home', compact('user', 'balance','transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all(),auth()->id);
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_type = Transaction::DEPOSITE;
        $transaction->amount = request('amount');
        $balance = Transaction::where('user_id', Auth::user()->id)->latest('created_at');
        if ($balance->count() > 1) {
            $transaction->balance = $balance->first()->balance + request('amount');
        } else {
            $transaction->balance = request('amount');
        }
        $transaction->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function withdrawMoney()
    {
        $withdraw = new Transaction;
        $withdraw->user_id = Auth::user()->id;
        $withdraw->transaction_type = Transaction::WITHDRAW;
        $withdraw->amount = request('w_amount');
        $balance = Transaction::where('user_id', Auth::user()->id)->latest('created_at');
        if ($balance->count() > 0) {
            $withdraw->balance = $balance->first()->balance - request('w_amount');
        } else {
            return back();
        }
        $withdraw->save();

        return back();
    }

    public function transferMoney()
    {
        $user = User::where('email', request('email_id'))->first();
        if ($user) {
            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = Transaction::TRANSFER;
            $transaction->details = request('email_id');
            $transaction->amount = request('T_amount');
            $balance = Transaction::where('user_id', $user->id)->latest('created_at');
            if ($balance->count() > 1) {
                $transaction->balance = $balance->first()->balance + request('T_amount');
            } else {
                $transaction->balance = request('T_amount');
            }
            $transaction->save();
            return back();
        } else {
            return back();
        }
    }
}
