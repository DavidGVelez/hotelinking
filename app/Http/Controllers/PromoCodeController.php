<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use App\Repositories\PromoCodeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends Controller
{
    protected $model;

    public function __construct(PromoCode $promo_code)
    {
        $this->model = new PromoCodeRepository($promo_code);
    }

    public function index()
    {
        $title = 'My codes';
        return view('promo_codes', compact('title'));
    }

    public function store()
    {
        $this->model->create([
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('my-codes'))->with('success', 'Promo code successfullt generated!');
    }

    public function redeem(Request $request)
    {
        if ($request->codes) {
            $this->model->redeem($request->except('_token')['codes']);
            return redirect(route('my-codes'))->with('success', 'Codes successfully redeemed!');
        }
        return redirect(route('my-codes'))->with('warning', 'You have not select any code! Try again');
    }
}
