<div class="row justify-content-center">
    <div class="col-12 col-md-4">
        <h1 class="mt-50px">Вход</h1>
        <form method="post" action="/login/auth">
            <div class="mb-20px">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Введите ваш e-mail">
            </div>
            <div class="mb-20px">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Введите ваш пароль">
            </div>
            <button type="submit" class="btn btn-default">Войти</button>
            <div class="mt-30px">
                <a href="/register">Регистрация</a>
            </div>
        </form>
    </div>
</div>