
@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Добавить новости</h1>
        
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Заголовок</th>
                  <th>Автор</th>
                  <th>Статус</th>
                  <th>Описание</th>
                  <th>Дата добавления</th>
                  <th>Действия</th>
              </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
             <tr>
                 <td>{{ $news->id }}</td>
                 <td>{{ $news->title }}</td>
                 <td>{{ $news->author }}</td>
                 <td>{{ $news->status }}</td>
                 <td>{{ $news->description }}</td>
                 <td>{{ $news->created_at }}</td>
                 <td><a href="">Изм.</a> &nbsp; <a href="" style="color: red;">Уд.</a> </td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</main>


@endsection