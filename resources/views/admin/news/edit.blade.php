@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Редактировать новости</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <x-alert type = "danger" : message = "$error"/>
            @endforeach
        @endif
        <form action = "{{route('admin.news.update',['news'=>$news])}}" method = "POST">
    @csrf
    @method('put')
    <div class = "form-group">
        <lable for = "category_id">Категория</lable>
        <select class = "form-control" name = "category_ids[]" id = "category_ids" multiple>
        <option value = "0">-- Выбрать --</option>
        @foreach($categories as $category)
            <option @if(in_array($category->id, $news->categories->pluck('id')->toArray()))
             selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
        </select>
    </div>

    <div class = "form-group">
        <lable for = "title">Название новости</lable>
        <input type = "text" name = "title" id = "title" value = "{{ $news->title }}" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "autor">Автор</lable>
        <input type = "text" name = "author" id = "author" value = "{{ $news->author }}" class = "form-control">
    </div>

     <div class = "form-group">
        <lable for = "status">Статус</lable>
        <select class = "form-control" name = "status" id = "status">
        <option value = "0">-- Выбрать --</option>
        @foreach($statuses as $status)
            <option @selected($news->status === $status)>{{ $status }}</option>
        @endforeach
        </select>
    </div>

    <div class = "form-group">
        <lable for = "image">Изображение</lable>
        <input type = "file" name = "image" id = "image"  class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "description">Подробное описание</lable>
        <textarea name = "description" id = "description" class = "form-control">{!! $news->description !!}</textarea>
    </div>

    <button type = "submit" class = "btn btn-success">Отправить</button>
</form>

</main>


@endsection