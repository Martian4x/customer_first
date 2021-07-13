 <div class="col-md-7">
    <h3 class="heading-md margin-bottom-20">Specifications</h3>
    <div class="row"> 
    'electronic_type', 'electronic_specs',  'electronic_other_specs', 'electronic_os', 'electronic_brand', 'electronic_model', 'electronic_color', 'electronic_weight', 'electronic_size', 'electronic_height', 'electronic_condition', 'electronic_release_date'
        <div class="col-sm-6">
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Brand Name: <span>{{{ $vars['product']->electronic->electronic_brand }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Product Type: <span>{{{ $vars['product']->electronic->electronic_type }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Details: <span>{{{ $vars['product']->electronic->electronic_specs }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Details: <span>{{{ $vars['product']->electronic->electronic_other_specs }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Model: <span>{{{ $vars['product']->electronic->electronic_model }}}</span></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Weight: <span>{{{ $vars['product']->electronic->electronic_weight }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Size: <span>{{{ $vars['product']->electronic->electronic_size }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Color: <span>{{{ $vars['product']->electronic->electronic_color }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Height: <span>{{{ $vars['product']->electronic->electronic_height }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Condition: <span>{{{ $vars['product']->electronic->electronic_condition }}} </span></li>
            </ul>
        </div>
    </div>
</div>