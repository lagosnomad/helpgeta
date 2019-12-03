<input type="hidden" name="group" value="{{$type}}">

<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">First Name</label>
            <div class="control has-icons-left">
                <input name="first_name" class="input" type="text" placeholder="Enter your first name" value="{{old('first_name')}}">
                <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="field">
            <label class="label">Last Name</label>
            <div class="control has-icons-left">
                <input name="last_name" class="input" type="text" placeholder="Enter your last name" value="{{old('last_name')}}">
                <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
            </div>
        </div>
    </div>
</div>
{{--<div class="columns">
    <div class="column is-6">
        <div class="field">
            <label class="label">Phone Number</label>
            <div class="control has-icons-left">
                <input name="phone" class="input" type="text" placeholder="Enter your phone number" value="{{old('phone')}}">
                <span class="icon is-small is-left"><i class="fa fa-phone"></i></span>
            </div>

        </div>
    </div>
</div>--}}
<div class="is-divider is-uppercase" data-content="ENTER ACCOUNT INFO"></div>
<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">Email Address</label>
            <div class="control has-icons-left">
                <input name="email" class="input" type="text" placeholder="Enter your email" value="{{old('email')}}">
                <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left">
                <input name="username" class="input" type="text" placeholder="Enter your username" value="{{old('username')}}">
                <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
            </div>

        </div>
    </div>

</div>
<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">Password</label>
            <p class="control has-icons-left">
                <input name="password" class="input" type="password" placeholder="Enter your Password">
                <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
            </p>
        </div>
    </div>
    <div class="column">
        <div class="field">
            <label class="label">Confirm Password</label>
            <p class="control has-icons-left">
                <input name="confirm_password" class="input" type="password" placeholder="Enter your Password">
                <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
            </p>
        </div>
    </div>
</div>
<div class="field">
    {!! NoCaptcha::renderJs() !!}
    <p>{!! NoCaptcha::display() !!}</p>
</div>
<div class="field">
    <div class="control">
        <button class="button is-primary is-medium is-6" type="submit">
            Create Account
        </button>
    </div>
    <p class="help">Creating an account signifies you’ve read and agree to our
        <a href="{{url('terms-and-conditions')}}">Terms of Service</a> and <a href="{{url('privacy-policy')}}">Privacy Policy</a></p>
</div>

<div class="field has-text-centered">
    <hr>
    <a href="{{url('login')}}">Already Registered? Sign In</a>
</div>