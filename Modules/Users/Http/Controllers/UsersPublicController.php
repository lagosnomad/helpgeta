<?php namespace Modules\Users\Http\Controllers;

use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Users\Events\UserHasRegistered;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Http\Requests\ProfileUpdateFormRequest;
use Modules\Users\Repositories\UserInterface as Repository;
use Illuminate\Support\Facades\Hash;
use Request;

class UsersPublicController extends BasePublicController
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

        $password_form = $this->form('Users\Forms\ChangePasswordForm', [
            'method' => 'POST',
            'url' => route('profile.change-password.post'),
        ]);

        return view('users::public.index')
            ->with(compact('form', 'password_form'));
    }

    public function postChangePassword(ChangePasswordFormRequest $request)
    {
        $data = $request->all();
        $data['password']  = Hash::make($data['password']);
        $model = $this->repository->update(current_user(), $data);

        /*\

        $email_data['password'] = $data['password'];
        $email_data['email'] = $model->email;
        $email_data['user_name'] = $model->first_name.' '.$model->last_name;

        event(new PasswordWasChangedEvent($email_data));*/
        flash('Your account has been successfully updated', 'success');

        return redirect()->back();
    }

    public function update(ProfileUpdateFormRequest $request)
    {
        $data = $request->all();

        $model = $this->repository->update(current_user(), $data);

        return redirect()->back()->withSuccess('Your account has been successfully updated');
    }

    public function resendActivation()
    {
        $user = current_user();
        event(new UserHasRegistered($user));
        flash('Activation link resent to '.$user->email,'success');
        return redirect()->back();
    }


}
