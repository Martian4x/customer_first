@if($view_name=='products.create')
<div id="textile" style="display: none" class="type_div">
@elseif($view_name=='products.edit')
<div>
@endif
    <p class="blue" style="text-align: center;"> Textile product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Brand<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('textile_brand', null, ['placeholder'=>'Brand type', 'class'=>'form-control', 'id'=>'textile_brand']) !!}
            {!! $errors->first('textile_brand', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Style</label>
        <div class="col-lg-10">
            {!! Form::text('textile_style', null, ['placeholder'=>'Style', 'class'=>'form-control', 'id'=>'textile_style']) !!}
            {!! $errors->first('textile_style', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Color<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('textile_color', null, ['placeholder'=>'Color', 'class'=>'form-control', 'id'=>'textile_color']) !!} 
            {!! $errors->first('textile_color', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Technics</label>
        <div class="col-lg-10">
            {!! Form::text('textile_technics', null, ['placeholder'=>'Technics used', 'class'=>'form-control', 'id'=>'textile_technics']) !!} 
            {!! $errors->first('textile_technics', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Material</label>
        <div class="col-lg-10">
            {!! Form::text('textile_material', null, ['placeholder'=>'Material used', 'class'=>'form-control', 'id'=>'textile_material']) !!} 
            {!! $errors->first('textile_material', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Sleeve length</label>
        <div class="col-lg-10">
            {!! Form::text('textile_sleeve_length', null, ['placeholder'=>'Sleeve length', 'class'=>'form-control', 'id'=>'textile_sleeve_length']) !!} 
            {!! $errors->first('textile_sleeve_length', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Age range</label>
        <div class="col-lg-10">
            {!! Form::text('textile_age_range', null, ['placeholder'=>'Age range', 'class'=>'form-control', 'id'=>'textile_age_range']) !!} 
            {!! $errors->first('textile_age_range', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Gender</label>
        <div class="col-lg-10">
            {!! Form::text('textile_gender', null, ['placeholder'=>'Gender', 'class'=>'form-control', 'id'=>'textile_gender']) !!} 
            {!! $errors->first('textile_gender', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Item type</label>
        <div class="col-lg-10">
            {!! Form::text('textile_item_type', null, ['placeholder'=>'Item type', 'class'=>'form-control', 'id'=>'textile_item_type']) !!} 
            {!! $errors->first('textile_item_type', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Thickness</label>
        <div class="col-lg-10">
            {!! Form::text('textile_thickness', null, ['placeholder'=>'Thickness', 'class'=>'form-control', 'id'=>'textile_thickness']) !!} 
            {!! $errors->first('textile_thickness', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Model No</label>
        <div class="col-lg-10">
            {!! Form::text('textile_model_number', null, ['placeholder'=>'Model no', 'class'=>'form-control', 'id'=>'textile_model_number']) !!} 
            {!! $errors->first('textile_model_number', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('textile_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'textile_size']) !!} 
            {!! $errors->first('textile_size', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>


</div>