<div style="display: flex">
    <?=\view('admin.menu') ?>
    <div>
        <h3 class="header">Создание новости</h3>
        <form action='<?=\route('createNewsAction') ?>' class="admin-container">
            <h4 class="mini-header">Категория</h4>
            <select name="category" style="width: 90%">
                <?php foreach ($categoriesNames as $engName => $name): ?>
                <option name="category" value="<?=$engName ?>"><?=$name?></option>
                <?php endforeach; ?>
            </select>
            <h4 class="mini-header">Заголовок</h4>
            <input required name="header" style="width: 90%" type="text" >
            <h4 class="mini-header">Краткое описание</h4>
            <textarea required rows="4" name="description" style="width: 90%; resize: none" ></textarea>
            <h4 class="mini-header">Текст статьи</h4>
            <textarea required name="text" style="width: 90%; resize: none" rows="9" ></textarea>
            <button >Добавить</button>
        </form>
    </div>
</div>
