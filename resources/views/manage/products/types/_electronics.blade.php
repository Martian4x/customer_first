<div id="electronics" style="display: none" class="type_div">
    <p class="blue" style="text-align: center;"> Electronics product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Brand<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('electronic_brand', null, ['placeholder'=>'Brand type', 'class'=>'form-control', 'id'=>'electronic_brand']) !!}
            {!! $errors->first('electronic_brand', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Product type</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_type', null, ['placeholder'=>'Product type', 'class'=>'form-control', 'id'=>'electronic_type   ']) !!}
            {!! $errors->first('electronic_type', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Model<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('electronic_model', null, ['placeholder'=>'Model no', 'class'=>'form-control', 'id'=>'electronic_model']) !!} 
            {!! $errors->first('electronic_model', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Color</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_color', null, ['placeholder'=>'Color', 'class'=>'form-control', 'id'=>'electronic_color']) !!} 
            {!! $errors->first('electronic_color', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Specifications</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_specs', null, ['placeholder'=>'Specifications', 'class'=>'form-control', 'id'=>'electronic_specs']) !!} 
            {!! $errors->first('electronic_specs', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Other Specifs</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_other_specs', null, ['placeholder'=>'Other Specifications', 'class'=>'form-control', 'id'=>'electronic_other_specs']) !!} 
            {!! $errors->first('electronic_other_specs', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'electronic_size']) !!} 
            {!! $errors->first('electronic_size', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Weight</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_weight', null, ['placeholder'=>'Weight', 'class'=>'form-control', 'id'=>'electronic_weight']) !!} 
            {!! $errors->first('electronic_weight', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Condition</label>
        <div class="col-lg-10">
            {!! Form::text('electronic_condition', null, ['placeholder'=>'Device condition', 'class'=>'form-control', 'id'=>'electronic_condition']) !!} 
            {!! $errors->first('electronic_condition', '<small class="error">:message</small>') !!}
        </div>
    </div>
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Released Date</label>
        <div class="col-lg-10">
            {!! Form::date('electronic_release_date', null, ['class'=>'form-control', 'id'=>'electronic_release_date']) !!} 
            {!! $errors->first('electronic_release_date', '<small class="error">:message</small>') !!}
        </div>
    </div>

</div>


</div>