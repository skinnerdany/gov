<h2>Проверка цифрового пропуска</h2>
<form method="post" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01"></label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Номер пропуска" name="pass_id" required>
            <div class="invalid-feedback">
                Заполните поле!
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success mb-3" name="go">Проверить</button>
</form>
<a href="index.php?controller=denis&action=createpass" class="btn btn-primary mb-3">Оформить пропуск</a>
