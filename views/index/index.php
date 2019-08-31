<!---->

<?php include("template/header.php"); ?>

<div class="container" id="main">
    <div class="row">
        <div class="col">
            <img src="/template/images/farpost.png" width="200">
        </div>
    </div>
</div>
<!-- Default form login -->
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-4-md-auto"  id="colform">

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form class="text-center border border-light p-5" id="foform" action="#" method="POST">

                <p class="h4 mb-4">Войдите</p>

                <!-- Email -->
                <input type="email"   name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" value=""/>

                <!-- Password -->
                <input type="password" name="password"  id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Пароль" value=""/>

                <div class="d-flex justify-content-around">

                </div>
                <!-- Sign in button -->
                <input  class="btn  btn-lg btn-block" id="batton" type="submit" name="submit"  value="Вход"/>

                <!-- Register -->
                <p>Нет доступа?
                    <a href="/regist">Регистрация</a>
                </p>
            </form>
        </div>
    </div>
</div>
