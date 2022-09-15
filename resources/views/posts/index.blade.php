<x-app-layout>
  <div class="container">

    <div class="grid grid-cols-1 gap-6 py-8 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($posts as $post)
        <article
          class="w-full bg-green-400 bg-center bg-cover h-80 
        @if ($loop->first) md:col-span-2 @endif"
          style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2021/09/06/16/45/nature-6602056_960_720.jpg @endif)">
          <div class="flex flex-col justify-center w-full h-full px-8">
            <div class="">
              @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}"
                  class="inline-block h-6 px-3 text-white bg-{{ $tag->color }}-600 rounded-full">{{ $tag->name }}</a>
              @endforeach
            </div>
            <h1 class="mt-2 text-4xl font-bold leading-8 text-white">
              <a href="{{ route('posts.show', $post) }}">
                {{ $post->name }}
              </a>
            </h1>
          </div>
        </article>
      @endforeach
    </div>

    <div class="mt-4">
      {{ $posts->links() }}
    </div>
  </div>
</x-app-layout>
