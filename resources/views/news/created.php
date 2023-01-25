<h1>Добавить новости</h1>
<form action = "{{route('created-news')}}" metod = " post ">
    @csrf
    <div class = "form-group">
        <lable for = "name">Название новости</lable>
        <input type = "text" name = "name" id = "name" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "short_description">Краткое описание</lable>
        <input type = "text" name = "short_description" id = "short_description" class = "form-control">
    </div>

    <div class = "form-group">
        <lable for = "full_description">Подробное описание</lable>
        <texterea name = "full_description" id = "full_description" class = "form-control">
    </div>

    <button type = "submit" class = "btn btn-success">Отправить</button>
</form>