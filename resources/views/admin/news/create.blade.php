@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Добавить новости</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <x-alert type = "danger" : message = "$error"/>
            @endforeach
        @endif
        <form action = "{{route('admin.news.store')}}" method = "POST">
    @csrf
    <div class = "form-group">
        <lable for = "title">Название новости</lable>
        <input type = "text" name = "title" id = "title" value = "{{ old('title')}}" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "short_description">Краткое описание</lable>
        <input type = "text" name = "short_description" id = "short_description" value = "{{ old('short_description')}}" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "full_description">Подробное описание</lable>
        <textarea name = "full_description" id = "full_description" value = "{{ old('full_description')}}" class = "form-control"></textarea>
    </div>

    <button type = "submit" class = "btn btn-success">Отправить</button>
</form>

</main>


@endsection