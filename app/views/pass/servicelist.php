
<h2>МОБИЛЬНЫЙ ПРОПУСК</h2>
    <hr class="mb-4">
    <h4>Внимание!</h4>
    <p class="lead">
        Контроль соблюдения режима самоизоляции может осуществляться с помощью данных мобильных операторов и банков.<br/>
        Выход без регистрации влечет административную ответственность в соответствии с законодательством
    </p>
  </div>
        <hr class="mb-4">
        <h4 class="mb-3">Выберите сервис</h4>
        <div class="d-block my-3" id="radios">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" value="passform" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Получить пропуск</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" value="checkpass" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Проверить пропуск</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" value="instructions" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">Прочитать правила пользованием пропуском</label>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="chooseService()">Продолжить</button>
    </div>
  </div>

