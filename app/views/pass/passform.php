<?php
  
?>


<div class="col">
      <h4 class="mb-3">Оформление пропуска</h4>
      <form class="needs-validation" method="POST" action = "printpass">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Ваше имя</label>
            <input type="text" class="form-control" name="name" value="" id="name" placeholder="Введите имя"  required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Ваша фамилия</label>
            <input type="text" class="form-control" name="second_name" value="" id="second_name" placeholder="Введите фамилию" required>
          </div>
        </div>
       <div class="mb-3">
          <label for="passport">Номер вашего паспорта</label>
          <input type="text" class="form-control" name="passport" value="" id="passport" placeholder="1122333444" required>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email">Ваш адрес электронной почты</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="email" class="form-control" name="email" value="" id="email" placeholder="email@primer.ru" required>
          </div>
        </div>
        

          <div class="col-md-6 mb-3">
            <label for="phone">Ваш телефон</label>
            <input type="text" class="form-control" name="phone" value="" id="phone" placeholder="9991118822" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="company">Укажите организацию</label>
          <input type="text" class="form-control" name="organization_name" value="" id="organization_name" placeholder='ООО "Ромашка" ' required>
        </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="inn">ИНН организации</label>
          <input type="text" class="form-control" name="inn" value="" id="inn" placeholder="123456789012" required>
        </div>
        

        <div class="col-md-6 mb-3">
          <label for="taxid">Ваш СНИЛС</label>
          <input type="text" class="form-control" name="tax_id" value="" id="tax-id" placeholder="12345678901" required>
        </div>
      </div>
        
          
          <h5>Укажите каким способом вы планируете передвигаться:</h5>
      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="carnumber">Номер ТС</label>
          <input type="text" class="form-control" name="car_number" value="" id="car_number" placeholder="A111AA777">
        </div>
        

        <div class="col-md-4 mb-3">
          <label for="socialcard">Социальная карта</label>
          <input type="text" class="form-control" name="social_card" value="" id="social_card" placeholder="5555333">
        </div>
          
          <div class="col-md-4 mb-3">
          <label for="troika">Карта тройка</label>
          <input type="text" class="form-control" name="troika" value="" id="troika" placeholder="123456789">
        </div>
      </div>
          <br/>
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="send">Получить пропуск</button>
      </form>


