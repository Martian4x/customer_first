@if($view_name=='products.create')
<div id="manufacturing" style="display: none" class="type_div">
@elseif($view_name=='products.edit')
<div>
@endif
    <p class="blue" style="text-align: center;"> Manufacturing product specification</p>
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Brand<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('manufact_brand', null, ['placeholder'=>'Brand type', 'class'=>'form-control', 'id'=>'manufact_brand']) !!}
            {!! $errors->first('manufact_brand', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Model</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_style', null, ['placeholder'=>'Product model', 'class'=>'form-control', 'id'=>'manufact_style']) !!}
            {!! $errors->first('manufact_style', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Color</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_color', null, ['placeholder'=>'Color', 'class'=>'form-control', 'id'=>'manufact_color']) !!} 
            {!! $errors->first('manufact_color', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Weight</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_weight', null, ['placeholder'=>'Weight', 'class'=>'form-control', 'id'=>'manufact_weight']) !!} 
            {!! $errors->first('manufact_weight', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Size</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_size', null, ['placeholder'=>'Size', 'class'=>'form-control', 'id'=>'manufact_size']) !!} 
            {!! $errors->first('manufact_size', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Capacity</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_capacity', null, ['placeholder'=>'Capacity', 'class'=>'form-control', 'id'=>'manufact_capacity']) !!} 
            {!! $errors->first('manufact_capacity', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Origin</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_origin', null, ['placeholder'=>'Origin', 'class'=>'form-control', 'id'=>'manufact_origin']) !!} 
            {!! $errors->first('manufact_origin', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Material</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_material', null, ['placeholder'=>'Material', 'class'=>'form-control', 'id'=>'manufact_material']) !!} 
            {!! $errors->first('manufact_material', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Composition</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_composition', null, ['placeholder'=>'Composition', 'class'=>'form-control', 'id'=>'manufact_composition']) !!} 
            {!! $errors->first('manufact_composition', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Condition</label>
        <div class="col-lg-10">
            {!! Form::text('manufact_condition', null, ['placeholder'=>'Condition', 'class'=>'form-control', 'id'=>'manufact_condition']) !!} 
            {!! $errors->first('manufact_condition', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Manufactured Date</label>
        <div class="col-lg-10">
            {!! Form::date('manufact_manufactured_date', null, ['class'=>'form-control', 'id'=>'manufact_manufactured_date']) !!} 
            {!! $errors->first('manufact_manufactured_date', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Expire Date</label>
        <div class="col-lg-10">
            {!! Form::date('manufact_expire_date', null, ['class'=>'form-control', 'id'=>'manufact_expire_date']) !!} 
            {!! $errors->first('manufact_expire_date', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>


</div>