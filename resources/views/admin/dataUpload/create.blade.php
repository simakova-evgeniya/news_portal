@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Выгрузка данных</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <x-alert type = "danger" : message = "$error"/>
            @endforeach
        @endif
        <form action = "{{route('admin.dataUpload.store')}}" method = "POST">
    @csrf
    <div class = "form-group">
        <lable for = "name">Введите имя</lable>
        <input type = "text" name = "name" id = "name" value = "{{ old('name')}}" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "phone">Введите номер телефона</lable>
        <input type = "number" name = "phone" id = "phone" value = "{{ old('phone')}}" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "email">Введите e-mail</lable>
        <input type = "text" name = "email" id = "email" value = "{{ old('email')}}" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "subject">Описание запроса</lable>
        <textarea name = "subject" id = "subject" value = "{{ old('subject')}}" class = "form-control"></textarea>
    </div>

    <button type = "submit" class = "btn btn-success">Отправить</button>
</form>

</main>


@endsection