
<ul>
<?php foreach ($categories as $engName => $category): ?>
    <li><a href=<?=route('categories') . "/$engName" ?>> <?=$category ?></a></li>
<?php endforeach; ?>
</ul>


