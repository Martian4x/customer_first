
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Name<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('name', null, ['placeholder'=>'Product name', 'class'=>'form-control', 'required', 'id'=>'name']) !!}
            {!! $errors->first('name', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Type<span class="red">*</span></label>
        <div class="col-lg-10">
            @if($view_name=='products.create')
                {!! Form::select('type', [''=>'Choose a product type']+$vars['types'],null, ['class'=>'form-control', 'id'=>'product_type', 'required']) !!} 
                {!! $errors->first('type', '<small class="error">:message</small>') !!}
            @elseif($view_name=='products.edit')
                        {!! Form::select('type', [''=>'Choose a product type']+$vars['types'],null, ['class'=>'form-control', 'id'=>'product_type', 'disabled']) !!} 
                        {!! $errors->first('type', '<small class="error">:message</small>') !!}
            @endif
        </div>
    </div>
</div>

@if($view_name=='products.create')
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Main<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('maincategory_id', [''=>'Main category'], null, ['class'=>'form-control', 'required', 'id'=>'maincategory']) !!}
            {!! $errors->first('maincategory', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Sub<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('subcategory_id', [''=>'Sub category'], null, ['class'=>'form-control', 'required', 'id'=>'subcategory']) !!} 
            {!! $errors->first('subcategory', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>
@elseif($view_name=='products.edit')
<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Main<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('maincategory_id', [''=>'Main category']+$vars['maincategories'], null, ['class'=>'form-control', 'required', 'id'=>'maincategory']) !!}
            {!! $errors->first('maincategory', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Sub<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::select('subcategory_id', [''=>'Sub category']+$vars['subcategories'], null, ['class'=>'form-control', 'required', 'id'=>'subcategory']) !!} 
            {!! $errors->first('subcategory', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>
@endif

<div class="form-group">
    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Original<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::text('price', null, ['placeholder'=>'Original price in USD', 'class'=>'form-control', 'required', 'id'=>'price']) !!} 
            {!! $errors->first('price', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Discount</label>
        <div class="col-lg-10">
            {!! Form::text('price_discount', null, ['placeholder'=>'Discount price in USD', 'class'=>'form-control', 'id'=>'price_discount']) !!} 
            {!! $errors->first('price_discount', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{-- <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Product Location</label>
        <div class="col-lg-10">
            {!! Form::text('product_address', null, ['placeholder'=>'Leave black if same as supplier address', 'class'=>'form-control', 'id'=>'product_address']) !!} 
            {!! $errors->first('product_address', '<small class="error">:message</small>') !!}
        </div>
    </div> --}}

    {{-- <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Min Order<span class="red">*</span></label>
        <div class="col-lg-10">
            {!! Form::number('min_quantity', null, ['placeholder'=>'Min order required', 'class'=>'form-control', 'min'=>0, 'id'=>'min_quantity']) !!} 
            {!! $errors->first('min_quantity', '<small class="error">:message</small>') !!}
        </div>
    </div> --}}
</div>

<div class="form-group">
    <div class="col-lg-12">
        <label class="col-lg-2 control-label">Featured Image</label>
        <div class="col-lg-9">
            <label for="file" class="input input-file">
                <div class="button"><input type="file" name="img" id="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Choose an image" readonly>
            </label>
        </div>
            {!! $errors->first('img', '<small class="error">:message</small>') !!}
    </div>
</div>

@if($view_name=='products.create')
@include('manage.products.types._agriculture')
@include('manage.products.types._clothing')
@include('manage.products.types._textile')
@include('manage.products.types._craft')
@include('manage.products.types._food')
@include('manage.products.types._manufacturing')
@include('manage.products.types._electronic')
@elseif($view_name=='products.edit')
@include('manage.products.types._'.lcfirst($vars['product']->type))
@endif

<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Description:</label>
    <div class="col-lg-9">
            {!! Form::textarea('description', null,['placeholder'=>'Description about the product', 'class'=>'form-control autogrow', 'required', 'id'=>'field-7']) !!}
            {!! $errors->first('description', '<small class="error">:message</small>') !!}
    </div>
</div>

    @if(\Auth::user()->role == 'Admin' || \Auth::user()->role == 'Staff')
<div class="form-group">
        <div class="col-lg-6">
            <label for="inputEmail1" class="col-lg-2 control-label">Status<span class="red">*</span></label>
            <div class="col-lg-10">
                {!! Form::select('status', \App\Product::status_list(),'Accepted', ['class'=>'form-control', 'id'=>'status', 'required']) !!} 
                {!! $errors->first('status', '<small class="error">:message</small>') !!}
            </div>
        </div>

    <div class="col-lg-6">
        <label for="inputEmail1" class="col-lg-2 control-label">Info</label>
        <div class="col-lg-10">
            {!! Form::text('status_info', null, ['placeholder'=>'Status information', 'class'=>'form-control', 'id'=>'status_info']) !!} 
            {!! $errors->first('status_info', '<small class="error">:message</small>') !!}
        </div>
    </div>
</div>
    @endif