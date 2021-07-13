 <div class="col-md-7">
    <h3 class="heading-md margin-bottom-20">Specifications</h3>
    <div class="row"> 
        <div class="col-sm-6">
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Brand Name: <span>{{{ $vars['product']->manufacturing->manufact_brand }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Product Type: <span>{{{ $vars['product']->manufacturing->manufact_product_type }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Model: <span>{{{ $vars['product']->manufacturing->manufact_model }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Color: <span>{{{ $vars['product']->manufacturing->manufact_color }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Weight: <span>{{{ $vars['product']->manufacturing->manufact_weight }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Size: <span>{{{ $vars['product']->manufacturing->manufact_size }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Capacity: <span>{{{ $vars['product']->manufacturing->manufact_capacity }}}</span></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Origin: <span>{{{ $vars['product']->manufacturing->manufact_origin }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Material: <span>{{{ $vars['product']->manufacturing->manufact_material }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Composition: <span>{{{ $vars['product']->manufacturing->manufact_composition }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Condition: <span>{{{ $vars['product']->manufacturing->manufact_condition }}} </span></li>
                <li><i class="fa fa-caret-right"></i>Manufacture date: <span>{{{ $vars['product']->manufacturing->manufact_manufactured_date }}}</span></li>
            </ul>
        </div>
    </div>
</div>