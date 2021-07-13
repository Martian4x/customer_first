
<div class="form-group" style="margin-top: 25px">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('name', null, ['placeholder'=>'Identification name', 'class'=>'form-control', 'required', 'id'=>'name']) !!}
            {!! $errors->first('name', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Status<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('type', [''=>'Choose a type']+$vars['status'],null, ['class'=>'form-control', 'id'=>'type', 'required']) !!} 
            {!! $errors->first('type', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-12">
        <label for="inputEmail1" class="col-lg-2 control-label">Caption</label>
        <div class="col-lg-10">
            {!! Form::text('caption', null, ['placeholder'=>'Caption words', 'class'=>'form-control', 'max'=>200, 'id'=>'name']) !!}
            {!! $errors->first('caption', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group"> 
<p class="red" style="text-align: center;">To get the best banner appiarence, your banner should be "880x350" pixel size, if not it will be resized</p>
    <div class="col-lg-12">
        <label class="col-lg-2 control-label">Photo<span class="red">*</span></label>
        <div class="col-lg-10">
            <label for="file" class="input input-file">
                <div class="button"><input type="file" name="img" id="file" required="true" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Choose an image" readonly>
            </label>
            {!! $errors->first('img', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
<p class="brown" style="text-align: center;">Fill the dates if you want to schedule banner show times</p>
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-3 control-label">Start Day</label>
        <div class="col-lg-9">
            {!! Form::date('start_day', date('d-M-Y'), ['placeholder'=>'Day to start showing', 'class'=>'form-control', 'id'=>'start_day']) !!}
            {!! $errors->first('start_day', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-3 control-label">End Day</label>
        <div class="col-lg-9">
            {!! Form::date('end_day', null, ['class'=>'form-control', 'min'=>date('d-M-Y'), 'id'=>'end_day']) !!} 
            {!! $errors->first('end_day', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Description:</label>
    <div class="col-lg-9">
            {!! Form::textarea('description', null,['placeholder'=>'Optional info', 'class'=>'form-control autogrow', 'id'=>'field-7']) !!}
            {!! $errors->first('description', '<small class="error">:message</small>') !!}
    </div>
</div>