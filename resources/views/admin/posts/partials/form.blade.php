<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Type post name']) !!}
  @error('name')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Type post slug', 'readonly']) !!}
  @error('slug')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('category_id', 'Category') !!}
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
  @error('category_id')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  <p class="font-weight-bold">Tags</p>
  @foreach ($tags as $tag)
    <label class="mr-2">
      {!! Form::checkbox('tags[]', $tag->id, null) !!}
      {{ $tag->name }}
    </label>
  @endforeach

  @error('tags')
    <br>
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  <p class="font-weight-bold">Status</p>

  <label class="mr-2">
    {!! Form::radio('status', 1, true) !!}
    Draft
  </label>

  <label>
    {!! Form::radio('status', 2) !!}
    Published
  </label>

  @error('status')
    <br>
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="mb-3 row">
  <div class="col">
    <div class="image-wrapper">
      @isset($post->image)
        <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="">
      @else
        <img id="picture" src="https://cdn.pixabay.com/photo/2021/09/06/16/45/nature-6602056_960_720.jpg"
          alt="">
      @endisset
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      {!! Form::label('file', 'Post image') !!}
      {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

      @error('file')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi doloribus hic commodi, pariatur illum voluptate
    repudiandae, asperiores expedita deleniti quidem, autem unde aspernatur fugiat nam reiciendis delectus ex nemo
    ipsum?
  </div>
</div>

<div class="form-group">
  {!! Form::label('extract', 'Extract:') !!}
  {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
  @error('extract')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('body', 'Body:') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
  @error('body')
    <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
