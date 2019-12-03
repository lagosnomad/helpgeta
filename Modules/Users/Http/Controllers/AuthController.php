<?php

namespace Modules\Users\Http\Controllers;


use Collective\Bus\Dispatcher;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Laravel\Socialite\Facades\Socialite;
use Modules\Core\Traits\RedirectingTrait;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Http\Requests\LoginRequest;
use Modules\Users\Http\Requests\RegisterFormRequest;
use Modules\Users\Http\Requests\ResetRequest;
use Modules\Users\Repositories\AuthenticationInterface;
use Modules\Users\Repositories\UserInterface;
use Modules\Users\Services\UserRegistration;
use Modules\Users\Exceptions\InvalidOrExpiredResetCode;
use Modules\Users\Exceptions\UserNotFoundException;

class AuthController extends Controller {

    use FormBuilderTrait, RedirectingTrait;
    /**
     * @var UserInterface
     */
    private $repository;

    public function __construct(AuthenticationInterface $auth)
    {

        $this->auth = $auth;
    }

    public function getLogin()
    {
        return view('users::login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'login'    => $request->email,
            'password' => $request->password,
        ];
        $remember = (bool) $request->get('remember_me', false);

        $error = $this->auth->login($credentials, $remember);
        if (!$error)
        {
            return $this->getAuthRedirect($this->auth->check());
        }

        //flash()->error($error);

        return $this->redirectBack(array('message' => $error));
    }

    public function postRegister(RegisterFormRequest $request)
    {
        app(UserRegistration::class)->register($request->all());

        //\Notification::success(trans('users::global.registration_success'));

        //return redirect()->back();
        $page = \Pages::getfirstBy('slug', 'register');

        return view('users::public.success')->with(compact('page'));
    }

    public function getActivate($userId, $code)
    {
        if ($this->auth->activate($userId, $code))
        {

            return redirect()->to('login')
                ->withSuccess(trans('Account activated you can now login'));
        }

        return redirect()->to('register')
            ->withError(trans('There was an error with the activation'));
    }

    public function getLogout()
    {
        $user = current_user();
        $redirect = url('login');
        if ($user)
        {
            switch ($user->roles()->first()->slug)
            {
                case 'artisan':
                case 'user':
                    $redirect = url('login');
                    break;
                default:
                    $redirect = url('auth/login');
            }
        }
        $this->auth->logout();

        return redirect($redirect);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    private function getAuthRedirect($user)
    {
        $message =  'You are successfully logged in';
        switch ($user->roles()->first()->slug)
        {
            case 'artisan':
            case 'user':
                $route = route('account.orders.index');
                return redirect()->intended($route)
                    ->withSuccess($message);
                break;
            default:
                return redirect()->intended('admin/dashboard')
                    ->withSuccess($message);
        }
    }

    public function getReset()
    {
        $form = $this->form('Users\Forms\AuthForm', [
            'method' => 'POST',
            'route'  => 'reset.post'
        ]);

        return view('users::public.reset.begin')->with('form', $form);
    }

    public function postReset(ResetRequest $request)
    {
        try
        {
            app(Dispatcher::class)->dispatchFrom('Modules\Users\Commands\BeginResetProcessCommand', $request);
        } catch (UserNotFoundException $e)
        {
            \Notification::error(trans('no user found'));

            return redirect()->back()->withInput();
        }

        \Notification::success(trans('Password reset link sent to your email address'));

        return redirect('login');
    }

    public function getResetComplete()
    {
        $form = $this->form('Users\Forms\ChangePasswordForm', [
            'method' => 'POST',
        ]);

        return view('users::public.reset.complete')->with(compact('form'));
    }

    public function postResetComplete($userId, $code, ChangePasswordFormRequest $request)
    {
        try
        {
            app(Dispatcher::class)->dispatchFromArray(
                'Modules\Users\Commands\CompleteResetProcessCommand',
                array_merge($request->all(), ['userId' => $userId, 'code' => $code])
            );
        } catch (UserNotFoundException $e)
        {
            \Notification::error(trans('user no longer exists'));

            return redirect()->back()->withInput();
        } catch (InvalidOrExpiredResetCode $e)
        {
            \Notification::error(trans('invalid/expired reset code'));

            return redirect()->back()->withInput();
        }

        \Notification::success(trans('Password has been reset. You can now login with your new password.'));

        return redirect('login');
    }


}