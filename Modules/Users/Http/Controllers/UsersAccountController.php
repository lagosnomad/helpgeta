<?php namespace Modules\Users\Http\Controllers;

use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Facades\FileUpload;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\ProfileUpdateFormRequest;
use Modules\Users\Repositories\UserInterface as Repository;
use Request;

class UsersAccountController extends BasePublicController
{

    use FormBuilderTrait;

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $model = current_user();
        $form = $this->form(config('users.form'), [
            'method' => 'PUT',
            'url' => route('profile.update'),
            'model' => $model
        ]);

        $categories_ids = json_encode([]);
        $categories_ids_with_amounts = json_encode([]);
        $base_category_id = 0;
        if($model->hasRoleName('Artisan') && isset($model->artisan))
        {
            if ($model->artisan->categories->count())
            {
                $categories = $model->artisan->categories;
                $categories_ids = $categories->pluck('id');
                $categories_ids_with_amounts = $categories->pluck('pivot.amount', 'id');
                $base_category_id = $categories->first()->id;
            }
        }

        return view('users::public.index')
            ->with(compact('form','model','categories_ids','categories_ids_with_amounts','base_category_id'));
    }



    public function getChangePassword()
    {
        $model = current_user();

        $form = $this->form('Users\Forms\ChangePasswordForm', [
            'method' => 'POST',
            'url' => route('profile.change-password.post'),
        ]);


        /*  $vendor_form = $this->form('Vendors\Forms\VendorsForm',[
            'model'=>$model->vendor
        ]);*/

        return view('users::public.change-password')
            ->with(compact('form'));
    }

    public function postChangePassword(ChangePasswordFormRequest $request)
    {
        $data = $request->all();
        $data['password']  = \Hash::make($data['password']);
        $model = $this->repository->update(current_user(), $data);

        /*

        $email_data['password'] = $data['password'];
        $email_data['email'] = $model->email;
        $email_data['user_name'] = $model->first_name.' '.$model->last_name;

        event(new PasswordWasChangedEvent($email_data));*/
        /*flash()->success('Your account has been successfully updated');*/

        return redirect()->back()->withSuccess('Your password has been successfully updated');
    }

    public function update(ProfileUpdateFormRequest $request)
    {
        $data = $request->all();
        //dd($data);
        if($request->hasFile('avatar')){
            $file = FileUpload::handle($request->file('avatar'), 'uploads/users');
            $data['avatar'] = $file['filename'];
        }
        $user = current_user();

        $model = $this->repository->update($user, $data);

        if(isset($data['artisan'])){

            $artisan_data = $data['artisan'] + ['user_id'=>$user->id];

            if($request->hasFile('artisan.identification_file'))
            {
                $file = FileUpload::handle($request->file('artisan.identification_file'), 'uploads/identifications');
                $artisan_data['identification_file'] = $file['filename'];
            }

            if($user->has('artisan')->count()){
                 $artisan = \Artisans::update($artisan_data + ['id'=>$user->artisan->id]);
            }else{
               $artisan =  \Artisans::create($artisan_data);
            }
            if(isset($data['add_category_item'])){
                $category_items = $data['add_category_item'];
                $new_items_array = [];
                foreach($category_items as $id => $value){
                    $new_items_array[$id] = ['amount' => $value];
                }
                $artisan->categories()->sync($new_items_array);
            }

        }

        return redirect()->back()->withSuccess('Your account has been successfully updated');
    }


}
