<div>
    <a href="<?=route('info')?>">На главную</a>
</div>
<?php foreach ($categories as $c): ?>
    <div style="border: 1px solid darkgrey">
        <h2><?=$c['title']?></h2>
        <p><?=$c['description']?></p>
        <div>
            <a href="<?=route('categories.show', ['id' => $c['id']])?>">Новости категории</a>
        </div>
    </div>
<?php endforeach; ?>