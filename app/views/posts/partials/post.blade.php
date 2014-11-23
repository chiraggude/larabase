<h2> {{ link_to($post->url, $post->title) }}</h2>

<p class="text-muted">{{ mb_strtoupper($post->updated_at->diffForHumans()) }}</p>

<p>{{ str_limit($post->content, 480, "...") }}</p>

{{ HTML::br('2') }}

<a class="btn btn-xs btn-default" href="{{ $post->url }}">Read More</a>

@if(Auth::check() && is_owner_or_admin(Auth::user(), $post))
<div class="pull-right">
    <a class="btn btn-xs btn-info" href="{{ $post->edit_url }}"><i class="fa fa-edit"></i> Edit</a>
    <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> Delete</button>
    {{ HTML::deleteModal('delete','posts','Post', $post->id) }}
</div>
@endif

<hr>