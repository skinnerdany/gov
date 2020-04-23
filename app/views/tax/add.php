<?php
    foreach(core::app()->input->get as $name => $value){
        $$name = $value;
    }

    if(isset($always)){
        $always = 'checked';
    }
?>

<form action="/tax/addOrganization" method="GET">
    <fieldset>
        <legend>Добавить организацию</legend>
        <div class="input_block">
            <label for="org">Органицация: </label>
            <input type="text" name="organization" id="org" value="<?php echo $organization ?? '' ?>">
        </div>
        <div class="input_block">
            <label for="inn">ИНН:</label>
            <input type="text" name="inn" id="inn" value="<?php echo $inn ?? '' ?>">
        </div>
        <div class="input_block">
            <label for="org_okved">ОКВЭД организации:</label>
            <input type="text" name="org_okved" id="org_okved" value="<?php echo $org_okved ?? '' ?>">
        </div>
        <div class="sbm_btn">
            <input type="submit" value="добавить" name="go">
        </div >
    </fieldset>
</form>


<form action="/tax/add" method="GET">
    <fieldset>
        <legend>Добавить ОКВЭД</legend>
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
            <input type="submit" value="добавить" name="go">
        </div>
    </fieldset>
</form>