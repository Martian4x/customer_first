@if($view_name=='products.create')
<div id="agriculture" style="display: none" class="type_div">
@elseif($view_name=='products.edit')
<div>
@endif
    <p class="blue" style="text-align: center;"> Agriculture product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Crop Type<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('agri_crop_type', null, ['placeholder'=>'Crop type', 'class'=>'form-control', 'id'=>'agri_crop_type']) !!}
            {!! $errors->first('agri_crop_type', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Quality</label>
        <div class="col-lg-10">
            {!! Form::text('agri_quality', null, ['placeholder'=>'Quality', 'class'=>'form-control', 'id'=>'agri_quality']) !!}
            {!! $errors->first('agri_quality', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('agri_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'agri_size']) !!} 
            {!! $errors->first('agri_size', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Weight</label>
        <div class="col-lg-10">
            {!! Form::text('agri_weight', null, ['placeholder'=>'Weight', 'class'=>'form-control', 'id'=>'agri_weight']) !!} 
            {!! $errors->first('agri_weight', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div> 

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Packing<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('agri_packaging', null, ['placeholder'=>'Packaging', 'class'=>'form-control','id'=>'agri_packaging']) !!} 
            {!! $errors->first('agri_packaging', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Origin</label>
        <div class="col-lg-10">
            {!! Form::text('agri_origin', null, ['placeholder'=>'Product Origin', 'class'=>'form-control', 'id'=>'agri_origin']) !!} 
            {!! $errors->first('agri_origin', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>
</div>