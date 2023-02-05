@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Обратная связь</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <x-alert type = "danger" : message = "$error"/>
            @endforeach
        @endif
        <form action = "{{route('admin.callBack.store')}}" method = "POST">
    @csrf
    <div class = "form-group">
        <lable for = "name">Введите имя</lable>
        <input type = "text" name = "name" id = "name" value = "{{ old('name')}}" class = "form-control">
    </div>


    <div class = "form-group">
        <lable for = "comment">Ваш комментарий</lable>
        <textarea name = "comment" id = "comment" value = "{{ old('comment')}}" class = "form-control"></textarea>
    </div>

    <button type = "submit" class = "btn btn-success">Отправить</button>
</form>

</main>


@endsection