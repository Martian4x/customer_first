 <div class="col-md-7">
    <h3 class="heading-md margin-bottom-20">Specifications</h3>
    <div class="row">
        <div class="col-sm-6">
           @if($vars['product']->food)
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Name: <span>{{{ $vars['product']->food->food_name }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Type: <span>{{{ $vars['product']->food->food_type }}}</span></li>
            </ul>
            @endif
        </div>
        {{-- <div class="col-sm-6">
            <ul class="list-unstyled specifies-list">
                <li><i class="fa fa-caret-right"></i>Origin: <span>{{{ $vars['product']->food->food_origin }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Color: <span>{{{ $vars['product']->food->food_color }}}</span></li>
                <li><i class="fa fa-caret-right"></i>Weight: <span>{{{ $vars['product']->food->food_weight }}}</span></li>
            </ul>
        </div> --}}
    </div>
</div>