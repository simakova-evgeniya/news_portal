
@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h1>Список новостей</h1>
<div class="link">
<a href="{{ route('admin.news.create') }}">Добавить новость</a>
</div>

        
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Категория</th>
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
                 <td>{{ $news->categories->map(fn($item)=> $item->title)->implode(",")}}</td>
                 <td>{{ $news->title }}</td>
                 <td>{{ $news->author }}</td>
                 <td>{{ $news->status }}</td>
                 <td>{{ $news->description }}</td>
                 <td>{{ $news->created_at }}</td>
                 <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Изм.</a> &nbsp; 
                 <a href="javascript:;" class = "delete" rel = "{{ $news->id }}" style="color: red;">Уд.</a> </td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
            {{$newsList->links()}}
    </div>

</main>


@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/news/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Удаление отменено");
                }
            });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush