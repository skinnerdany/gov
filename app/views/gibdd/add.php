
<form action=""  method="post" class="addform">
<div class="form-row ">
   
        <div class="form-group col-md-6">
        <label for="inputEmail4">Серия, номер паспорта</label>
        <input type="text" class="form-control" id="inputEmail4" name="passport"
         placeholder="Введите данные"
         value=<?php echo  $data['passport'] ?? null ?>
         >
        <span class="example">Пример: 1234567890</span>
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Государственный регистрационный номер т/c</label>
        <input type="text" class="form-control" id="inputPassword4" name="number_auto"
        placeholder="Введите данные"
        value=<?php echo  htmlspecialchars($data['number_auto']) ?? null ?>
        >
        <span class="example">Пример: О111ХК777</span>
        </div>
    
</div>
<input class="btn btn-primary float-right" type="submit" value="Добавить" name="go">
<!-- <input type="text" placeholder="Введите cерия, номер паспорта" name="passport">
<input type="text" placeholder="Введите номер т/c" name="numer_auto">
<input type="submit" name="go" value="Добавить"> -->
</form>
<?php $style = $error? 'addInfoError': 'addInfo' ?>
<div class="text-center <?php echo $style ?> "><?php echo $result ?? null ?></div>