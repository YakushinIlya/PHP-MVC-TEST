<div class="row">
    <div class="col-12">
        <h1 class="title"><?=$title?></h1>
        <div class="article">

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>e-mail</th>
                    <th>Дата регистрации</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['fullname']?></td>
                        <td><?=$user['email']?></td>
                        <td><?=$user['created_at']?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>