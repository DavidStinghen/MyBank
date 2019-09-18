<?php

namespace App\Http\Controllers;
use Account;

class FlowController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'agency_id' => 'required',
            'account_id' => 'required',
            'value' => 'required',
        ]);

        $flow = new Flow();
        $flow->agency_id = $request->agency_id;
        $flow->account_id = $request->account_id;
        $flow->value =$request->value;
        
        $account = DB::table('accounts')->where('id', $this->account_id)->select('balance')->get();

        $add = $this->value + $this->balance;

        save($flow);
        
        return response()->json([
            'success' => true,
            'flow' => $flow,
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'agency_id' => 'required',
            'account_id' => 'required',
            'value' => 'required',
        ]);

        $flow = new Flow();
        $flow->agency_id = $request->agency_id;
        $flow->account_id = $request->account_id;
        $flow->value =$request->value;
        
        $account = DB::table('accounts')->where('id', $this->account_id)->select('balance')->get();

        if ($this->balance < $this->value) {
            return response()->json([
                'success' => false,
                'message' => 'Your balance is lower at the value',
            ]);
        }

        $add = $this->value - $this->balance;

        save($flow);
    
        return response()->json([
            'success' => true,
            'flow' => $flow,
        ]);
    }
}