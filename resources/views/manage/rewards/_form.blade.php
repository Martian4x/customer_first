
    <div class="col-lg-12" style="margin-bottom: 10px">
        <label for="inputEmail1" class="col-lg-2 control-label">Customer</label>
        <div class="col-lg-10">
            <select name="customer_id" id="customer_id" class="form-control select2" required>
                <option value="">-- select customer --</option>
                @foreach($vars['supplier_customers'] as $customer)
                <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mob_no}})</option>
                @endforeach
            </select>
            {!! $errors->first('customer_id', '<small class="error">:message</small>') !!}
        </div>
    </div>
    <br>
    
    <div class="col-lg-12" style="margin-bottom: 10px">
        <label for="inputEmail1" class="col-lg-2 control-label">Product</label>
        <div class="col-lg-10">
            <select name="product_id" id="product_id" class="form-control select2" required>
                <option value="">-- select product --</option>
                @foreach($vars['supplier_products'] as $product)
                <option value="{{$product->id}}">{{$product->name}} ({{number_format($product->price)}} TZS)</option>
                @endforeach
            </select>
            {!! $errors->first('product_id', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-12" style="margin-bottom: 10px">
        <label for="inputEmail1" class="col-lg-2 control-label">Qty</label>
        <div class="col-lg-9">
            {!! Form::number('quantity', null, ['placeholder'=>'quantity', 'min'=>1, 'required', 'class'=>'form-control','id'=>'quantity']) !!} 
            {!! $errors->first('quantity', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-12" style="margin-bottom: 10px">
        <label for="inputEmail1" class="col-lg-2 control-label">Courier</label>
        <div class="col-lg-10">
            <select name="courier_id" id="courier_id" class="form-control select2" required>
                <option value="">-- select courier --</option>
                @foreach($vars['supplier_couriers'] as $courier)
                <option value="{{$courier->id}}">{{$courier->name}} ({{$courier->mob_no}})</option>
                @endforeach
            </select>
            {!! $errors->first('courier_id', '<small class="error">:message</small>') !!}
        </div>
    </div>

    <div class="col-lg-12" style="margin-bottom: 10px">
        <label for="inputEmail1" class="col-lg-2 control-label">Transport Fee</label>
        <div class="col-lg-9">
            {!! Form::number('shipping_price', null, ['placeholder'=>'shipping_price', 'min'=>0, 'required', 'class'=>'form-control','id'=>'shipping_price']) !!} 
            {!! $errors->first('shipping_price', '<small class="error">:message</small>') !!}
        </div>
    </div>



<div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Info</label>
    <div class="col-lg-9">
            {!! Form::textarea('order_description', null,['placeholder'=>'Optional Info', 'style'=>'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;', 'class'=>'form-control autogrow', 'id'=>'field-7']) !!}
            {!! $errors->first('order_description', '<small class="error">:message</small>') !!}
    </div>
</div>

<div class="col-lg-12 checkbox">
    <label>
        <input type="checkbox"  name="send_sms" value="true" checked>
        Notify a customer about the order with an SMS.
    </label>
</div>