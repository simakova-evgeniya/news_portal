@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Добавить новости</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <x-alert type = "danger" :message = "$error"/>
            @endforeach
        @endif
        <form action = "{{route('admin.news.store')}}" method = "POST">
    @csrf
    <div class = "form-group">
        <lable for = "category_id">Категория</lable>
        <select class = "form-control" name = "category_ids[]" id = "category_ids" multiple>
        <option value = "0">-- Выбрать --</option>
        @foreach($categories as $category)
            <option @if((int)old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
        </select>
        
    </div>

    <div class = "form-group">
        <lable for = "title">Название новости</lable>
        <input type = "text" name = "title" id = "title" value = "{{ old('title')}}" class = "form-control" @error('title') is-invalid @enderror>
        
    </div>

    <div class = "form-group">
        <lable for = "autor">Автор</lable>
        <input type = "text" name = "author" id = "author" value = "{{ old('author')}}" class = "form-control" @error('author') is-invalid @enderror>
    </div>

     <div class = "form-group">
        <lable for = "status">Статус</lable>
        <select class = "form-control" name = "status" id = "status">
        <option value = "0">-- Выбрать --</option>
        @foreach($statuses as $status)
            <option @selected(old('status') === $status)>{{ $status }}</option>
        @endforeach
        </select>
    </div>

    <div class = "form-group">
        <lable for = "image">Изображение</lable>
        <input type = "file" name = "image" id = "image"  class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "description">Подробное описание</lable>
        <textarea name = "description" id = "description" class = "form-control">{{ old('description')}}</textarea>
    </div>

    <button type = "submit" class = "btn btn-success">Отправить</button>
</form>

</main>


@endsection