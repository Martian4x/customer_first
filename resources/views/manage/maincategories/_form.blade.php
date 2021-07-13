
<div class="form-group">
    <div class="col-lg-12">
        <label for="inputEmail1" class="col-lg-2 control-label">Name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('name', null, ['placeholder'=>'Category name', 'class'=>'form-control', 'required', 'id'=>'name']) !!}
            {!! $errors->first('name', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Type<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('type', [''=>'Choose a type']+$vars['types'],null, ['class'=>'form-control', 'id'=>'type', 'required']) !!} 
            {!! $errors->first('type', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Quantity Unit<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('quantity_unit', null, ['placeholder'=>'Tons, Kgs, Items, Pieces, Liters, etc...', 'class'=>'form-control', 'required', 'id'=>'name']) !!}
            {!! $errors->first('quantity_unit', '<small class="error">:message</small>') !!}
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