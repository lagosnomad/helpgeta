<?php namespace Modules\Checkout\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Modules\Checkout\Http\Requests\FormRequest;
use Modules\Users\Repositories\AuthenticationInterface;

class CheckoutController extends Controller {

    public function __construct(AuthenticationInterface $auth)
    {
        $this->auth = $auth;
    }

    public function index(FormRequest $request)
    {
        $data = $request->session()->get('checkout_data');
        if (is_null($data)) {
            return redirect()->route('categories');
        }
        $user = $this->auth->check();
        if(!$user){
            session()->put('url.intended',route('checkout'));
            return redirect('login')->with('toast_msg','Login is required to continue');
        }

        return view('checkout::index')
            ->with($data);
    }

    public function sessionStore()
    {
        request()->session()->forget('checkout_data');

        $artisan_id  = request()->get('artisan_id');
        $category_id = request()->get('category_id');

        $artisan_model = \Artisans::bySlug($artisan_id,['user','categories']);
        $artisan = single_artisan_collection($artisan_model);

        $category = $artisan_model->categories()->where('uri',$category_id)->where('artisan_category.amount','!=',0.00)->first();
        $category = !is_null($category) ? $category : $artisan_model->categories()->where('artisan_category.amount','>',0)->first();

        $data = ['artisan'=>$artisan,'ref_category'=>$category];

        request()->session()->put('checkout_data', $data);

        return response()->json('success', 200);

    }

}
