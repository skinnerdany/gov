<?php
    foreach(core::app()->input->post as $name => $value){
        $$name = $value;
    }

    if(isset($always)){
        $always = 'checked';
    }
?>

<form action="/?controller=tax&action=addOkved" method="POST">
    <fieldset>
        <legend>Добавить/Изменить ОКВЭД</legend>
        <div class="input_block">
            <label for="okved">ОКВЭД:</label>
            <input type="text" name="okved" id="okved" value="<?php echo $okved ?? '' ?>">
        </div>
        <div class="input_block">
            <label for="always">
                <input type="checkbox" name="always" id="always" <?php echo $always ?? '' ?> >Непрерывный цикл
            </label>
        </div>
        <div class="sbm_btn">
            <input type="submit" value="Принять" name="go">
        </div>
    </fieldset>
</form>
<div>
    <h3>Коды ОКВЭД</h3>
    <table>
        <tr>
            <th>Код</th>
            <th>Непрерывный</th>
        </tr>
    <?php 
        if(empty($okvedCodes)){
            echo "Коды ОКВЭД не ещё не добавлены в базу данных";
        }else{
            foreach($okvedCodes as $value){
    ?>
        <tr>
            <td>
                <?php echo $value['name'] ?>
            </td>
            <td>
                <?php echo $value['always'] == 1 ? 'Да' : 'Нет' ?>
            </td>
        </tr>
    <?php
            }
        }
    ?>
    </table>
</div>