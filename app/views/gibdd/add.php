<?php
 $hidden = isset($data["changeSubmit"])?$data['number']:''; 
  echo 'скрытое поле - ' . $hidden;
?>



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
        <input type="text" class="form-control" id="inputPassword4" name="number"
        placeholder="Введите данные"
        value=<?php echo $data['number'] ?? null ?>
        >
        <span class="example">Пример: О111ХК777</span>
        </div>
        <input type="hidden" name="edit" value=<?php echo $hidden ?>>
</div>
<?php $value =  isset($data["changeSubmit"])? 'value="Редактировать"':'value="Добавить"'?>
<input class="btn btn-primary float-right"
 type="submit"
  <?php echo $value ?> name="go">

</form>
<?php $style = $error? 'addInfoError': 'addInfo' ?>
<div class="text-center <?php echo $style ?> "><?php echo $result ?? null ?></div>