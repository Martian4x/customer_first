 <div class="col-md-7">
    <h3 class="heading-md margin-bottom-20">Specifications</h3>
    <div class="row">
        <div class="col-sm-6"> 'product_id', 'mineral_product_type', 'mineral_brand', 'mineral_size', 'mineral_color', 'mineral_origin'
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Brand Name: <span>{{{ $vars['product']->mineral->mineral_brand }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Type: <span>{{{ $vars['product']->mineral->mineral_product_type }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Size: <span>{{{ $vars['product']->mineral->mineral_size }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Quality: <span>{{{ $vars['product']->mineral->mineral_quality }}}</span></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Origin: <span>{{{ $vars['product']->mineral->mineral_origin }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Color: <span>{{{ $vars['product']->mineral->mineral_color }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Weight: <span>{{{ $vars['product']->mineral->mineral_weight }}}</span></li>
            </ul>
        </div>
    </div>
</div>