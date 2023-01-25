<?php foreach($categories as $c): ?>
<div>
    <h2><?=$c['title']?> </h2>
    <p><?=$c['description']?></p>
    <div>
        <a href="<?=route('categories')?>">Назад</a>
    </div>
</div>
<?php endforeach; ?>   