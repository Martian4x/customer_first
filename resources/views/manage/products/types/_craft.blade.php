@if($view_name=='products.create')
<div id="craft" style="display: none" class="type_div">
@elseif($view_name=='products.edit')
<div>
@endif
    <p class="blue" style="text-align: center;"> Craft product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Brand<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('craft_brand', null, ['placeholder'=>'Brand type', 'class'=>'form-control', 'id'=>'craft_brand']) !!}
            {!! $errors->first('craft_brand', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Style</label>
        <div class="col-lg-10">
            {!! Form::text('craft_style', null, ['placeholder'=>'Style type', 'class'=>'form-control', 'id'=>'craft_style']) !!}
            {!! $errors->first('craft_style', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Color<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('craft_color', null, ['placeholder'=>'Color', 'class'=>'form-control', 'id'=>'craft_color']) !!} 
            {!! $errors->first('craft_color', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Technics</label>
        <div class="col-lg-10">
            {!! Form::text('craft_technics', null, ['placeholder'=>'Technics used', 'class'=>'form-control', 'id'=>'craft_technics']) !!} 
            {!! $errors->first('craft_technics', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Material</label>
        <div class="col-lg-10">
            {!! Form::text('craft_material', null, ['placeholder'=>'Material used', 'class'=>'form-control', 'id'=>'craft_material']) !!} 
            {!! $errors->first('craft_material', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Sleeve length</label>
        <div class="col-lg-10">
            {!! Form::text('craft_sleeve_length', null, ['placeholder'=>'Sleeve length', 'class'=>'form-control', 'id'=>'craft_sleeve_length']) !!} 
            {!! $errors->first('craft_sleeve_length', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Age range</label>
        <div class="col-lg-10">
            {!! Form::text('craft_age_range', null, ['placeholder'=>'Age range', 'class'=>'form-control', 'id'=>'craft_age_range']) !!} 
            {!! $errors->first('craft_age_range', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Gender</label>
        <div class="col-lg-10">
            {!! Form::text('craft_gender', null, ['placeholder'=>'Gender', 'class'=>'form-control', 'id'=>'craft_gender']) !!} 
            {!! $errors->first('craft_gender', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Item type</label>
        <div class="col-lg-10">
            {!! Form::text('craft_item_type', null, ['placeholder'=>'Item type', 'class'=>'form-control', 'id'=>'craft_item_type']) !!} 
            {!! $errors->first('craft_item_type', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Thickness</label>
        <div class="col-lg-10">
            {!! Form::text('craft_thickness', null, ['placeholder'=>'Thickness', 'class'=>'form-control', 'id'=>'craft_thickness']) !!} 
            {!! $errors->first('craft_thickness', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Model No</label>
        <div class="col-lg-10">
            {!! Form::text('craft_model_number', null, ['placeholder'=>'Model no', 'class'=>'form-control', 'id'=>'craft_model_number']) !!} 
            {!! $errors->first('craft_model_number', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('craft_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'craft_size']) !!} 
            {!! $errors->first('craft_size', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>


</div>