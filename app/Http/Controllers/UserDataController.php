<?php

namespace App\Http\Controllers;

use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDataController extends Controller
{
    public function index(Request $request) {
        $results['data'] = [];
        $response = DB::table('user_data')->get();
        foreach ($response as $rec) {
            $results['data'][] = [
                'user' => $rec->email,
                'meet-id' => $rec->meet_id,
                'attentive' => $rec->attentive,
                'tab_changes' => $rec->tab_changes
            ];
        }
        return json_encode($results);
    }
}
