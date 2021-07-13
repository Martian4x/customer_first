@if($view_name=='products.create')
<div id="clothing" style="display: none" class="type_div">
@elseif($view_name=='products.edit')
<div>
@endif
    <p class="blue" style="text-align: center;"> Clothing product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Brand<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('cloth_brand', null, ['placeholder'=>'Brand name', 'class'=>'form-control', 'id'=>'cloth_brand']) !!}
            {!! $errors->first('cloth_brand', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Style</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_style', null, ['placeholder'=>'Style', 'class'=>'form-control', 'id'=>'cloth_style']) !!}
            {!! $errors->first('cloth_style', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Color<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('cloth_color', null, ['placeholder'=>'cloth_Color', 'class'=>'form-control', 'id'=>'cloth_color']) !!} 
            {!! $errors->first('cloth_color', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Technics</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_technics', null, ['placeholder'=>'Technics used', 'class'=>'form-control', 'id'=>'cloth_technics']) !!} 
            {!! $errors->first('cloth_technics', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Material</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_material', null, ['placeholder'=>'Material used', 'class'=>'form-control', 'id'=>'cloth_material']) !!} 
            {!! $errors->first('cloth_material', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Sleeve length</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_sleeve_length', null, ['placeholder'=>'Sleeve length', 'class'=>'form-control', 'id'=>'cloth_sleeve_length']) !!} 
            {!! $errors->first('cloth_sleeve_length', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Age range</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_age_range', null, ['placeholder'=>'Age range', 'class'=>'form-control', 'id'=>'cloth_age_range']) !!} 
            {!! $errors->first('cloth_age_range', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Gender</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_gender', null, ['placeholder'=>'Gender', 'class'=>'form-control', 'id'=>'cloth_gender']) !!} 
            {!! $errors->first('cloth_gender', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Item type</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_item_type', null, ['placeholder'=>'Item type', 'class'=>'form-control', 'id'=>'cloth_item_type']) !!} 
            {!! $errors->first('cloth_item_type', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Thickness</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_thickness', null, ['placeholder'=>'Thickness', 'class'=>'form-control', 'id'=>'cloth_thickness']) !!} 
            {!! $errors->first('cloth_thickness', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Model No</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_model_number', null, ['placeholder'=>'Model no', 'class'=>'form-control', 'id'=>'cloth_model_number']) !!} 
            {!! $errors->first('cloth_model_number', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('cloth_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'cloth_size']) !!} 
            {!! $errors->first('cloth_size', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>


</div>