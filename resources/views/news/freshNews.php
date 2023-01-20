<h3 style="text-align: center">Свежие новости</h3>
<?php foreach ($list as $news): ?>
    <h4 ><?=$news->getHeader()?></h4>
    <div><?=$news->getDescription()?></div>
    <div style="display:flex; justify-content:space-between;">
        <a href=<?=\route('news') . "/{$news->getId()}"?>>Читать</a>
        <div><?=$news->getCreationDate()?> г.</div>
    </div>
    <hr>
<?php endforeach; ?>
