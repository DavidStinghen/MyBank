<?php

namespace App\Http\Controllers;
use Account;

class TypeController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $type = new Type();
        $type->name = $request->name;

        save($type);
        
        return response()->json([
            'success' => true,
            'type' => $type,
        ]);
    }
}