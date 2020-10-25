<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaceTracker extends Controller
{
    public function index(Request $request) {
        if ($request->has('meet-id') && $request->input('meet-id') != null) {
            DB::table('user_data')
                ->updateOrInsert(
                    ['email' => $request->input('user')],
                    [
                        'meet_id' => $request->input('meet-id'),
                        'attentive' => ($request->input('attentive') == 'true'),
                        'number_of_changes' => 0
                    ]
                );
        }
        return response('', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);
    }

}
