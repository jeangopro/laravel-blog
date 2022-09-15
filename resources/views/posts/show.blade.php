<x-app-layout>
  <div class="container py-8">
    <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>

    <div class="mb-2 text-lg text-gray-500">
      {!! $post->extract !!}
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
      {{-- Content First --}}
      <div class="lg:col-span-2">
        <figure class="bg-blue-600">
          @if ($post->image)
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($post->image->url) }}"
              alt="" />
          @else
            <img class="object-cover object-center w-full h-72"
              src="https://cdn.pixabay.com/photo/2021/09/06/16/45/nature-6602056_960_720.jpg" alt="">
          @endif
        </figure>

        <div class="mt-4 text-base text-gray-500">
          {!! $post->body !!}
        </div>
      </div>

      {{-- Content Relationed --}}
      <aside>
        <h1 class="mb-4 text-2xl font-bold text-gray-600">Más en {{ $post->category->name }}</h1>
        <ul>
          @foreach ($similars as $similar)
            <li class="mb-4">
              <a class="flex" href="{{ route('posts.show', $similar) }}">
                @if ($similar->image)
                  <img class="object-cover h-20 min-w-36" src="{{ Storage::url($similar->image->url) }}" alt="">
                @else
                  <img class="object-cover object-center w-full h-72"
                    src="https://cdn.pixabay.com/photo/2021/09/06/16/45/nature-6602056_960_720.jpg" alt="">
                @endif

                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </aside>
    </div>
  </div>
</x-app-layout>
