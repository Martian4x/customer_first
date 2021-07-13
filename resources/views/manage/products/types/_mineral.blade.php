@if($view_name=='products.create')
<div id="mineral" style="display: none" class="type_div">
@elseif($view_name=='products.edit')
<div>
@endif
    <p class="blue" style="text-align: center;"> Mineral product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Brand<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('mineral_brand', null, ['placeholder'=>'Brand type', 'class'=>'form-control', 'id'=>'mineral_brand']) !!}
            {!! $errors->first('mineral_brand', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('mineral_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'mineral_size']) !!}
            {!! $errors->first('mineral_size', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Color</label>
        <div class="col-lg-10">
            {!! Form::text('mineral_color', null, ['placeholder'=>'Color', 'class'=>'form-control', 'id'=>'mineral_color']) !!} 
            {!! $errors->first('mineral_color', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Origin</label>
        <div class="col-lg-10">
            {!! Form::text('mineral_origin', null, ['placeholder'=>'Origin', 'class'=>'form-control', 'id'=>'mineral_origin']) !!} 
            {!! $errors->first('mineral_origin', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>


</div>