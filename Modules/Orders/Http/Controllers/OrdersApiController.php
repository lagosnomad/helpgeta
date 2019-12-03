<?php namespace Modules\Orders\Http\Controllers;

use Carbon\Carbon;
use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Orders\Emails\OrderConfirmedEmail;
use Modules\Orders\Entities\OrderStatus;
use Modules\Orders\Events\UserHasOrdered;
use Modules\Orders\Repositories\OrderInterface as Repository;
use Illuminate\Support\Facades\Mail;

class OrdersApiController extends BaseApiController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $models = $this->repository->all(['status','item']);

        return response()->json($models);
    }

    public function updateStatus($order_number)
    {
        $status_slug = request('slug');
        $model = $this->repository->getFirstBy('order_number',$order_number,['item','user','artisanUser']);
        $status = OrderStatus::where('slug',$status_slug)->first();

        $model->status_id = $status->id;
        $model->save();

        if($status_slug == 'confirmed'){
            $email_data = [
                'category' => $model->item->category,
                'order_number' => $model->order_number,
                'artisan_business_name' => $model->artisanUser->present()->fullname,
                'artisan_user_email' => $model->artisanUser->email,
                'user_email' => $model->user->email,
                'user_name' => $model->user->present()->fullname
            ];
            Mail::to($model->user->email)
                ->send(new OrderConfirmedEmail($email_data));
        }

        return response()->json('success', 200);
    }

    public function updatePayment($order_number)
    {
        try
        {
            $paymentDetails = \Paystack::getPaymentData();
            $status = $paymentDetails['data']['status'];
            $reference = $paymentDetails['data']['reference'];
            $authorization_code = $paymentDetails['data']['authorization']['authorization_code'];
            $fees = $paymentDetails['data']['fees'];
            $amount = $paymentDetails['data']['amount'];
            if($status == 'success'){
                $order = $this->repository->getFirstBy('order_number',$order_number);
                if($order){
                    $payment_array = [
                        'transaction_id' => $authorization_code,
                        'status' => $status,
                        'transaction_fee' => naira_conversion($fees),
                        'amount'=> naira_conversion($amount),
                        'payment_method'=>'paystack',
                        'reference'=>$reference,
                    ];
                    $order->payment()->create($payment_array);
                }
                $status = OrderStatus::where('slug','in-progress')->first();
                $order->status_id = $status->id;
                $order->save();

                return response()->json('success', 200);
            }
        } catch(\Exception $e){
            return response()->json('An Error Occurred', 400);
        }
        return response()->json('An Error Occurred', 400);
    }


    public function store()
    {
        $data = request()->all();
        $category = $data['item'];
        $artisan = $data['artisan'];
        $user = current_user();
        $data['user_id'] = $user->id;
        $data['status_id'] = 1;
        $data['order_number'] = generate_order_no();
        $data['artisan_id'] = $artisan['user_id'];

        $order = $this->repository->create($data);

        $order_items_array = [
            'category_id' => $category['id'],
            'category' => $category['category'],
            'slug' => $category['slug'],
            'uri' => $category['uri'],
            'amount' => $category['pivot']['amount'],
            'is_hourly_based' => $category['is_hourly_based'],
            'qty' => $data['qty'],
        ];
        $order_item = $order->item()->create($order_items_array);

        $date_for_email = [];
        foreach($data['dates'] as $date){
            $d = new Carbon($date['date']);
            $h = $date['hours'];
            $order_items_date_array = ['date' => $d, 'hours' => $h];
            $order_item->dates()->create($order_items_date_array);

            $h = !is_null($h) ? ' for '.$h.' hours' : '';
            $date_for_email[] = $d->toDayDateTimeString().$h;
        }

        $email_data = [
            'category' => $category['category'],
            'artisan_business_name' => $artisan['business_name'],
            'order_number' => $order->order_number,
            'order_date' => $order->created_at,
            'dates' => rtrim(implode(',',$date_for_email), ','),
            'artisan_user_email' => $artisan['user_email'],
            'artisan_user_phone' => $artisan['user_phone'],
            'user_email' => $user->email,
            'user_phone' => $user->phone,
            'user_name' => $user->username
        ];

        event(new UserHasOrdered($email_data));

        return response()->json();
    }


}
