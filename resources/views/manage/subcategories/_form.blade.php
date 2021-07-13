{!! Form::hidden('maincategory_id', $vars['maincategory']->id) !!}

<div class="form-group">
    <div class="col-lg-12">
        <label for="inputEmail1" class="col-lg-2 control-label">Main category name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('type',$vars['maincategory']->name, ['class'=>'form-control', 'id'=>'type', 'readonly']) !!} 
            {!! $errors->first('type', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-12">
        <label for="inputEmail1" class="col-lg-2 control-label">Sub category name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('name', null, ['placeholder'=>'Sub category name', 'class'=>'form-control', 'required', 'id'=>'name']) !!}
            {!! $errors->first('name', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">

<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Description:</label>
    <div class="col-lg-9">
            {!! Form::textarea('description', null,['placeholder'=>'Optional info', 'class'=>'form-control autogrow', 'required', 'id'=>'field-7']) !!}
            {!! $errors->first('description', '<small class="error">:message</small>') !!}
    </div>
</div>