{{-- // 'fname', 'mname', 'lname', 'email', 'password', 'img', 'address', 'mob_no', 'role', 'description' --}}

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-4 control-label">First Name<span class="red">*</span></label>
        <div class="col-lg-8">
            {!! Form::text('fname', null, ['placeholder'=>'First name', 'class'=>'form-control', 'required', 'id'=>'name']) !!} 
            {!! $errors->first('fname', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-4 control-label">Last Name<span class="red">*</span></label>
        <div class="col-lg-8">
            {!! Form::text('lname', null, ['placeholder'=>'Lastt name', 'class'=>'form-control', 'required', 'id'=>'name']) !!} 
            {!! $errors->first('lname', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group">

    <div class="col-lg-6">
        <label for="email" class="col-lg-2 control-label">Email<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::email('email', null, ['placeholder'=>'Email address', 'class'=>'form-control', 'required', 'id'=>'email']) !!}
            <span id="message_email"></span>
            {!! $errors->first('email', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputUsername" class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
            {!! Form::text('username', null, ['placeholder'=>'Will be shown on the forum', 'class'=>'form-control', 'id'=>'username']) !!} 
            <span id="message_username"></span>
            {!! $errors->first('username', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Password<span class="red">*</span></label>
        <div class="col-lg-10">
        @if(!isset($vars['user']->id))
            <input type="password" name="password" required="true" class="form-control" id="password" placeholder="Password">
        @else
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        @endif
            {!! $errors->first('password', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Password2<span class="red">*</span></label>
        <div class="col-lg-10">
        @if(!isset($vars['user']->id))
            <input type="password" name="password_confirmation" required="true" class="form-control" id="password_confirmation" placeholder="Password confirmation">
        @else
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password confirmation">
        @endif
            <div class="color-red" id="divCheckPasswordMatch"></div>
            {!! $errors->first('password_confirmation', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Mobile</label>
        <div class="col-lg-10">
            {!! Form::text('mob_no', null, ['placeholder'=>'Phone number', 'class'=>'form-control', 'required', 'id'=>'mob_no']) !!} 
            {!! $errors->first('mob_no', '<small class="error">:message</small>') !!}
        </div>
    </div>

@if(\Auth::user()->role == 'Admin')
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Role<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('role', ['User'=>'User','Admin'=>'Admin', 'Staff'=>'Staff'],null, ['class'=>'form-control', 'id'=>'role']) !!} 
            {!! $errors->first('role', '<small class="error">:message</small>') !!}
        </div>
    </div>
@endif
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Address</label>
        <div class="col-lg-9">
            {!! Form::text('address', null, ['placeholder'=>'Address', 'class'=>'form-control','id'=>'address']) !!} 
            {!! $errors->first('address', '<small class="error">:message</small>') !!}
        </div>
    </div>

@if(\Auth::user()->role == 'Admin')
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Status<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('status', ['Active'=>'Active','Pending'=>'Pending', 'Banned'=>'Banned', 'Inactive'=>'Inactive'],'User', ['class'=>'form-control', 'id'=>'status']) !!} 
            {!! $errors->first('status', '<small class="error">:message</small>') !!}
        </div>
    </div>
@endif
</div>

<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Info</label>
    <div class="col-lg-9">
            {!! Form::textarea('description', null,['placeholder'=>'Optional Info', 'style'=>'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;', 'class'=>'form-control autogrow', 'id'=>'field-7']) !!}
            {!! $errors->first('description', '<small class="error">:message</small>') !!}
    </div>
</div>

@if(!isset($vars['user']->id))
<div class="col-lg-6 checkbox">
    <label>
        <input type="checkbox"  name="terms" value="true" required="true">
        I read <a href="/terms" data-toggle="modal" data-target=".bs-terms-modal-lg" class="color-green">Terms and Conditions <span class="color-red">*</span></a>
    </label>
</div>
@endif