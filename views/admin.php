<?php include("template/header.php"); ?>


<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="/template/images/farpost.png" height="30" class="d-inline-block align-top" alt="">
    </a>
    <a href="<?php Registr::exitUser()?> " id="batton1" class="btn btn-secondary" role="button" aria-pressed="true" >Выход</a>
</nav>
<center>
    <h3>Добро пожаловать в личный кабинет <?= $user['email']; ?> <h3/>
</center>


<div class="container" id="main">
    <div class="row">
        <div class="col">
            <h4>Добавьте новые фотографии в фотогалерею...</h4>
        </div>
    </div>
</div>

<div class="wrapper">
    <form>
        <input type="file"  name="name" id="fails" multiple="multiple" accept=".text,image/*">
        <button class="upload_files button">Загрузить файлы</button>
        <div class="ajax-reply"></div>
    </form>
    <button id="resetf">очистить форму</button>
</div>

<div class="container" id="ikra">

</div>


<?php include("template/footer.php"); ?>





