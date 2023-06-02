<div class="row">
    <div class="col-12">
        <h1 class="title"><?=$title?></h1>
    </div>
    <div class="col-12">
        <div class="article">

            <form method="post" action="/dashboard/structure/create">
                <div class="mb-20px">
                    <label for="title" class="form-label">Заголовок элемента</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Введите заголовок элемента">
                </div>
                <div class="mb-20px">
                    <label for="description" class="form-label">Описание элемента</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Введите описание элемента">
                </div>
                <div class="mb-20px">
                    <label for="parent" class="form-label">Родитель элемента</label>
                    <select id="parent" name="parent" class="form-control">
                        <option selected disabled>-- Выберите родителя элемента --</option>
                        <option value="0" class="bg-red">Без родителя (главный)</option>
                        <?php foreach($structures as $structure): ?>
                            <option value="<?=$structure['id']?>"><?=$structure['title']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Сохранить</button>
            </form>

        </div>
    </div>
</div>
