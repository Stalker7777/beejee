<div id="body" class="row col-md-4 col-md-offset-4">
    <div class="form-group"><h1>Авторизация</h1></div>

    <div class="form-group text-danger">
        <?= $error_text ?>
    </div>
    
    <form action="index.php?form=login" method="post">
        <div class="form-group">
            <label >Ваш логин</label>
            <input class="form-control" name="login" type="text">
        </div>
        <div class="form-group">
            <label>Ваш пароль</label>
            <input class="form-control" name="password" type="password">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Войти" class="btn btn-success">
            <a href="index.php" class="btn btn-primary">Вернуться обратно</a>
        </div>
    </form>
</div>