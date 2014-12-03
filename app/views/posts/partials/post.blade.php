<div class="panel panel-default">
    <div class="panel-body">

        <h2>{{ link_to($post->url, $post->title) }}</h2>

        <p class="text-muted">{{ mb_strtoupper($post->updated_at->diffForHumans()) }}</p>

        <p>{{ str_limit($post->content, 480, "...") }}</p>

        <a class="pull-right" href="{{ $post->url }}">Read More</a>

    </div>
</div>