
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Supplier Name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('company_name', null, ['placeholder'=>'Company name', 'class'=>'form-control', 'required', 'id'=>'company_name']) !!}
            {!! $errors->first('company_name', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Email<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::email('supplier_email', null, ['placeholder'=>'Email address', 'class'=>'form-control', 'required', 'id'=>'supplier_email']) !!} 
            {!! $errors->first('supplier_email', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Mob No<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('supplier_mob_no', null, ['placeholder'=>'Company name', 'class'=>'form-control', 'required', 'id'=>'supplier_mob_no']) !!}
            {!! $errors->first('supplier_mob_no', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Tel No<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('supplier_tel_no', null, ['placeholder'=>'supplier_tel_no', 'class'=>'form-control', 'required', 'id'=>'supplier_tel_no']) !!} 
            {!! $errors->first('supplier_tel_no', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Address<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('supplier_address', null, ['placeholder'=>'Supplier address', 'class'=>'form-control', 'required', 'id'=>'supplier_address']) !!} 
            {!! $errors->first('supplier_address', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Postal<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('supplier_postal_code', null, ['placeholder'=>'Postal code', 'class'=>'form-control', 'required', 'id'=>'supplier_postal_code']) !!} 
            {!! $errors->first('supplier_postal_code', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Country<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('supplier_country', [''=>'Choose a country']+$vars['countries'],null, ['class'=>'form-control', 'id'=>'supplier_country', 'required']) !!} 
            {!! $errors->first('supplier_country', '<small class="error">:message</small>') !!}
        </div>
    </div>

    @if(\Auth::user()->role == 'Admin' || \Auth::user()->role == 'Staff')
        <div class="col-lg-6">
            <label for="inputEmail1" class="col-lg-2 control-label">Status<span class="red">*</span></label>
            <div class="col-lg-10">
                {!! Form::select('supplier_status', ['Active'=>'Active','Pending'=>'Pending', 'Banned'=>'Banned', 'Inactive'=>'Inactive'],'Active', ['class'=>'form-control', 'id'=>'supplier_status', 'required']) !!} 
                {!! $errors->first('supplier_status', '<small class="error">:message</small>') !!}
            </div>
        </div>
    @endif
</div>

<div class="form-group">
    <div class="col-lg-12">
        <label class="col-lg-2 control-label">Upload Logo</label>
        <div class="col-lg-9">
            <label for="file" class="input input-file">
                <div class="button"><input type="file" name="cover" id="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Choose a cover image" readonly>
            </label>
        </div>
            {!! $errors->first('cover', '<small class="error">:message</small>') !!}
    </div>
</div>

<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Description:</label>
    <div class="col-lg-9">
            {!! Form::textarea('supplier_description', null,['placeholder'=>'Optional info', 'class'=>'form-control autogrow', 'id'=>'field-7']) !!}
            {!! $errors->first('supplier_description', '<small class="error">:message</small>') !!}
    </div>
</div>