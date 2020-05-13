<?php
         $valuePersonal = isset ($post['personal_transport']) && $post['personal_transport'] === 'on' ? "checked" : "";
         $valuePublic = isset ($post['public_transport']) && $post['public_transport'] === 'on' ? "checked" : "";
        $valuePermanent = isset($post['type_pass']) && $post['type_pass'] == 'permanent' ?'selected' : '';
        $valueTemporary = isset($post['type_pass']) && $post['type_pass'] == 'temporary' ?'selected' : '';
?>

<form action=""  method="post" class="addform" name="pass">
<div class="form">
        <div class="form-group col-md-8"><b><u>Тип пропуска</b></u></div>
        <div class="form-group col-md-8">
            <select class="custom-select custom-select-sm" name="type_pass" id="type_pass">
                    <option  value="permanent" <?php echo $valuePermanent ?? 'selected' ?>>Постоянный (служебный)</option>
                    <option value="temporary" <?php echo $valueTemporary ?? null ?>>Разовый</option>
            </select>
        </div>  
        <div class="form-group col-md-8"><b><u>Персональные данные</b></u></div>
        <div class="form-group col-md-8">
            <label for="inputEmail4">Имя</label>
            <input type="text" class="form-control" name="name"
            placeholder="Введите данные"
            value=<?php echo $post['name'] ?? "" ?>
            >
            <span class="example">Пример: Иван</span>
        </div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorName ?? null ?>
        </div>
            <div class="form-group col-md-8">
            <label for="inputPassword4">Фамилия</label>
            <input type="text" class="form-control"  name="second_name"
            placeholder="Введите данные"
            value=<?php echo $post['second_name'] ?? "" ?>
            >
            <span class="example">Пример: Иванов</span>
        </div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorSecondName ?? null ?>
        </div>

            <div class="form-group col-md-8">
            <label for="inputPassword33">Серия, номер паспорта</label>
            <input type="text" class="form-control"  name="passport"
            placeholder="Введите данные"
            value=<?php echo $post['passport'] ?? "" ?>
            >
            <span class="example">Пример: 123456789</span>
        </div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorPassport ?? null ?>
        </div>
       
            <div class="form-group col-md-8">
            <label for="inputPassword33">Телефон</label>
            <input type="text" class="form-control"  name="phone"
            placeholder="Введите данные"
            value=<?php echo $post['phone'] ?? "" ; ?>
            >
            <span class="example">Пример: 8909990099</span>
        </div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorPhone ?? null ?>
        </div>
        
            <div class="form-group col-md-8">
            <label for="inputPassword33">Email</label>
            <input type="text" class="form-control"  name="email"
            placeholder="Введите данные"
            value=<?php echo $post['email'] ?? "" ?>
            >
            <span class="example">Пример: example@gmail.com</span>
        </div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorEmail ?? null ?>
        </div>

        
        <div class="form-group col-md-8"><b><u>Вид транспорта для передвижения</b></u></div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorTransport ?? null ?>
        </div>
        <div id="transport">
        <div class="form-group col-md-8" id="parentPersonal" >
        
            <input type="checkbox" aria-label="Checkbox for following text input" id="personal" name="personal_transport" <?php echo $valuePersonal ?> >
            <label for="personal">На личном транспорте</label>
        </div>
        

        <div class="form-group col-md-8" id="auto">
            <label for="inputPassword33">Номер транспортного средства</label>
            <input type="text" class="form-control"  name="number_auto"
            placeholder="Введите данные"
            value=<?php echo $post['number_auto'] ?? null ?>
            >
            <span class="example">Пример: А111АА777</span>
        </div>



        <div class="form-group col-md-8 error" >
            <?php echo  $errorNumberAuto ?? null ?>
        </div>
        <div class="form-group col-md-8" id="parentPublic">
            <input type="checkbox" aria-label="Checkbox for following text input" id="public" name="public_transport" <?php echo $valuePublic ?> >
            <label for="public">На общественном транспорте</label>
        </div> 


        <div class="form-group  col-md-9 row" id="public_transport">
                <div class="form-group col-md-4" >
                    <label for="inputPassword33">Карта тройка</label>
                    <input type="text" class="form-control"  name="troika"
                    placeholder="Введите данные"
                    id="troika_card"
                    value=<?php echo $post['troika'] ?? null ?>
                    >
                    <span class="example">Пример: 1234567</span>
                </div>
                
                
                <div class="form-group col-md-4" >
                    <label for="inputPassword33">Социальная карта</label>
                    <input type="text" class="form-control"  name="social"
                    placeholder="Введите данные"
                    id="social_card"
                    value=<?php echo $post['social'] ?? null ?> 
                    >
                    <span class="example">Пример: 7654321</span>
                </div>
        </div>



        <div class="form-group col-md-8 error" >
            <?php echo  $errorSocial ?? null ?>
        </div>
        </div>
        <div id="depend_pass"> 
            <div class="form-group col-md-8" ><b><u>Работодатель</b></u></div>
            <div class="form-group col-md-8">
                <label for="inputPassword33">Наименование организации</label>
                <input type="text" class="form-control"  name="organization_name"
                placeholder="Введите данные"
                value=<?php  echo $post['organization_name'] ?? null ?>
                >
                
            </div>
            
            <div class="form-group col-md-8">
                <label for="inputPassword33">ИНН</label>
                <input type="text" class="form-control"  name="inn"
                placeholder="Введите данные"
                value=<?php echo $post['inn'] ?? null ?>
                >
                <span class="example">Пример: 123456789</span>
                
            </div>
        <div class="form-group col-md-8 error" >
            <?php echo  $errorJob ?? null ?>
        </div>
        </div>
        <div class="form-group col-md-8"><b><u>Срок действия пропуска</b></u></div>
        <div class="form-group  col-md-10 row" id="public_transport">
                        <div class="form-group col-md-4" >
                            <label for="inputPassword33">Начало действия</label>
                            <input type="date" class="form-control"  name="create_date"
                            id="start_date"
                            value=<?php  echo  $post['create_date'] ?? date("Y-m-d") ?>
                            min=<?php echo date("Y-m-d") ?>
                            max=<?php echo date("Y-m-d",time() + 604800) ?>
                            >
                            <!-- <span class="example">Пример: 1234567</span> -->
                        </div>
                        
                        
                        <div class="form-group col-md-4" >
                            <label for="inputPassword33">Окончание действия</label>
                            <input type="date" class="form-control"  name="expire_date"
                            id="end_date"
                            value=""
                            min=""
                            max=""
                            >
                            <!-- <span class="example">Пример: 7654321</span> -->
                        </div>
                        <div class="form-group col-md-8 error" >
                            <?php echo  $error ?? null ?>
                        </div>
            </div>
        </div>
<div class="form-row ">
    <div class="col-12">
        <input class="btn btn-primary "
        type="submit"
        value="Получить пропуск"
        name="go"
        id="getPass"
         >
    </div>
</div>

</form>
