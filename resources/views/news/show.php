<?php foreach($news as $n): ?>
<div>
    <h2><?=$n['title']?></h2>
    <p><?=$n['description']?></p>
    <div>
        <strong>
            <?=$n['author']?> (<?=$n['created_at']?>)
        </strong>
        <a href="<?=route('news')?>">Назад</a>
    </div>
</div>
<?php endforeach; ?>