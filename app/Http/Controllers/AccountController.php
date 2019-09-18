<?php

namespace App\Http\Controllers;

class AccountController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'user_id' => 'required',
            'type_id' => 'required'
        ]);

        $account = new Account();
        $account->user_id = $request->user_id;
        $account->type_id = $request->type_id;
        save($account);
        
        return response()->json([
            'success' => true,
            'account' => $account,
        ]);
    }

}