@props(['post'])
<article class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">
  @if ($post->image)
    <img class="object-cover object-center w-full h-72" src="{{ Storage::url($post->image->url) }}" alt="">
  @else
    <img class="object-cover object-center w-full h-72"
      src="https://cdn.pixabay.com/photo/2021/09/06/16/45/nature-6602056_960_720.jpg" alt="">
  @endif
  <div class="px-6 py-4">
    <h2 class="mb-2 text-xl font-bold">
      <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
    </h2>

    <div class="text-base text-gray-700">{!! $post->extract !!}</div>
  </div>

  <div class="px-6 pt-4 pb-2">
    @foreach ($post->tags as $tag)
      <a class="inline-block px-3 py-1 mr-2 text-sm text-gray-700 bg-gray-200 rounded-full"
        href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
    @endforeach
  </div>
</article>
