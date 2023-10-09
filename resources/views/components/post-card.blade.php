<div class="post-card">
    <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
    <div class="post-content">
        <h2 class="post-title">{{ $post->title }}</h2>
        <p class="post-description">{{ $post->description }}</p>
    </div>
</div>
