<table class="table">
    <tr>
        <td>
            <strong>ID:</strong>
        </td>
        <td><?=$structure['id']?></td>
    </tr>
    <tr>
        <td>
            <strong>Заголовок:</strong>
        </td>
        <td><?=$structure['title']?></td>
    </tr>
    <tr>
        <td>
            <strong>Описание:</strong>
        </td>
        <td><?=$structure['description']?></td>
    </tr>
    <tr>
        <td>
            <a href="/dashboard/structure/edit?id=<?=$structure['id']?>" class="btn btn-default text-decoration-none mr-10px">Редактировать</a>
        </td>
        <td>
            <a href="/dashboard/structure/delete?id=<?=$structure['id']?>" class="btn btn-default text-decoration-none mr-10px">Удалить</a>
        </td>
    </tr>
</table>