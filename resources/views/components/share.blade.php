<div class="col-md-5 social-buttons" style="margin: 0;padding: 0px;"">
    <ul class="list-unstyled list-inline blog-info share-icons">
        <li >Share on: 
        	<a href="{{ $vars['lyric']->share(request()->fullUrl(), $vars['lyric']->title)['facebook'] }}" 
        target="_blank" class="share_fb"><i class="fa fa-facebook"></i> Facebook</a>, 
        </li>
        <li> 
        	<a href="{{ $vars['lyric']->share(request()->fullUrl(), $vars['lyric']->title)['twitter'] }}" 
        target="_blank" class="share_tw"><i class="fa fa-twitter"></i> Twitter</a>, 
        </li>
        <li> 
        	<a href="{{ $vars['lyric']->share(request()->fullUrl(), $vars['lyric']->title)['gplus'] }}" 
        target="_blank" class="share_gp"><i class="fa fa-google-plus"></i> Google Plus</a> 
        </li>
    </ul>
</div>