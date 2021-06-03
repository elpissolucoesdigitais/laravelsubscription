<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('subscriptions.index', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }
    public function store(Request $request)
    {
        $request->user()
                ->newSubscription('default', 'price_1Iy48bCtdCfatAyWtOb2Ql1z')
                ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }
    public function premium()
    {
        return view('subscriptions.premium');
    }
}
