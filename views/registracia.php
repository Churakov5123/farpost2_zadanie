<?php include("template/header.php"); ?>



<body>
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

            <?php if ($result): ?>

                <h5>Вы зарегистрированы!</h5>
                <p> Перейти в кабинет: <a href="/"> Вход</a></p>

            <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form class="text-center border border-light p-5" id="foform"  method="post" action="#">

                <p class="h4 mb-4">Регистрация</p>

                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value="<?php echo $email; ?>"/>

                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Пароль" name="password" value="<?php echo $password; ?>"/>


                <!-- Reg-in in button -->
                <input  class="btn  btn-lg btn-block" id="batton" type="submit" name="submit"  value="Регистрация"/>

                <!-- Sing-in -->
                <p>Войти в кабинет?
                    <a href="/">Вход</a>
                </p>
            </form>
            <?php endif; ?>

        </div>
    </div>
</div>



<?php include("template/footer.php"); ?>

