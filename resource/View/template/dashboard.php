<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link href="/media/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <nav class="nav col-12 col-md-6 p-20px">
            <ul>
                <li>
                    <a href="/dashboard">Главная</a>
                </li>
                <li>
                    <a href="/dashboard/structure">Структура</a>
                </li>
                <li>
                    <a href="/dashboard/users">Пользователи</a>
                </li>
                <li>
                    <a href="/logout">Выход</a>
                </li>
            </ul>
        </nav>

        <section class="page-wrap col-12 col-md-6">
            <div class="container structure">
                <?=$content?>
            </div>
        </section>
    </div>
</div>

<div class="modal" id="modal">
    <div class="content"></div>
    <div class="modal-footer">
        <a href="#" class="btn modal-btn" onclick="this.closest('.modal').setAttribute('style', 'display: none;')">Закрыть окно</a>
    </div>
</div>

<script>
    function displayShow(item) {
        let itemA   = document.getElementById("a-"+item);
        let itemImg = document.getElementById("img-"+item);
        let nextA   = itemA.nextElementSibling;

        if(nextA==null){
            itemImg.style.display = 'none';
            return;
        }

        if(nextA.style.display == 'block'){
            itemImg.style.transform = 'none';
            nextA.setAttribute("style", "display: none;");
        } else {
            itemImg.style.transform = 'rotate(90deg)';
            nextA.setAttribute("style", "display: block;");
        }
    }

    function modalShow(item) {
        let modal = document.getElementById("modal");
        let modalContent = modal.querySelector('.content');
        modal.setAttribute("style", "display: block;");
        let request = new XMLHttpRequest();
        let url = '/api/structure?id=' + item;
        request.open('GET', url);
        request.setRequestHeader('Content-Type', 'text/html');
        request.addEventListener("readystatechange", () => {
            if (request.readyState === 4 && request.status === 200) {
                modalContent.innerHTML = request.responseText;
            }
        });
        request.send();

    }
</script>

</body>
</html>