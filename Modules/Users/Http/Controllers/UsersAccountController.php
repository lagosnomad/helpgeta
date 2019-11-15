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

        return view('users::public.index')
            ->with(compact('form','model'));
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

        if($request->hasFile('avatar')){
            $file = FileUpload::handle($request->file('avatar'), 'uploads/users');
            $data['avatar'] = $file['filename'];
        }
        $user = current_user();

        $model = $this->repository->update($user, $data);

        if(isset($data['artisan'])){

            $artisan_data = $data['artisan'] + ['user_id'=>$user->id];

            if($user->has('artisan')->count()){
                 $artisan = \Artisans::update($artisan_data + ['id'=>$user->artisan->id]);
            }else{
               $artisan =  \Artisans::create($artisan_data);
            }
            if(isset($artisan_data['categories'])){
                $artisan->categories()->sync($artisan_data['categories']);
            }

        }

        return redirect()->back()->withSuccess('Your account has been successfully updated');
    }


}
