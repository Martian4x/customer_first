{{-- // 'fname', 'mname', 'lname', 'email', 'password', 'img', 'address', 'mob_no', 'role', 'description' --}}

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">First Name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('fname', null, ['placeholder'=>'First name', 'class'=>'form-control', 'required', 'id'=>'fname']) !!} 
            {!! $errors->first('fname', '<small class="error">:message</small>') !!}
        </div>
    </div>
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Last Name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('lname', null, ['placeholder'=>'First name', 'class'=>'form-control', 'required', 'id'=>'lname']) !!} 
            {!! $errors->first('lname', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group">

    <div class="col-lg-6">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            {!! Form::email('email', null, ['placeholder'=>'Email address', 'class'=>'form-control', 'id'=>'email']) !!}
            <span id="message_email"></span>
            {!! $errors->first('email', '<small class="error">:message</small>') !!}
        </div>
    </div>
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Mobile</label>
        <div class="col-lg-10">
            {!! Form::text('mob_no', null, ['placeholder'=>'Phone number', 'class'=>'form-control', 'id'=>'mob_no']) !!} 
            {!! $errors->first('mob_no', '<small class="error">:message</small>') !!}
        </div>
    </div>

</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Address</label>
        <div class="col-lg-9">
            {!! Form::text('address', null, ['placeholder'=>'Address', 'class'=>'form-control','id'=>'address']) !!} 
            {!! $errors->first('address', '<small class="error">:message</small>') !!}
        </div>
    </div>
    <div class="col-lg-3">
        <label for="inputEmail1" class="col-lg-3 control-label">Group</label>
        <div class="col-lg-9">
            {!! Form::select('user_group_id', ['--select group']+\App\UserGroup::whereSupplierId($vars['supplier']->id)->pluck('name','id')->toArray(),null, ['class'=>'form-control','id'=>'user_group']) !!} 
            {!! $errors->first('user_group_id', '<small class="error">:message</small>') !!}
        </div>
    </div>
    <div class="col-lg-3">
        <label for="inputEmail1" class="col-lg-3 control-label">Language</label>
        <div class="col-lg-9">
            {!! Form::select('lang', ['--select language','en'=>'English','sw'=>'Swahili'],null, ['class'=>'form-control','id'=>'user_group']) !!} 
            {!! $errors->first('lang', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Info</label>
    <div class="col-lg-9">
            {!! Form::textarea('description', null,['placeholder'=>'Optional Info', 'style'=>'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;', 'class'=>'form-control autogrow', 'id'=>'field-7']) !!}
            {!! $errors->first('description', '<small class="error">:message</small>') !!}
    </div>
</div>