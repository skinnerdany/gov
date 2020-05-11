<?php

    foreach(core::app()->input->get as $name => $value){
        $$name = $value;
    }

?>
<form action="/?controller=tax&action=update" method="GET">
    <fieldset>
        <legend>Редактировать организацию</legend>
        <input type="hidden" name="id" value="<?php echo $id ?? '' ?>" > 
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
            <input type="submit" value="изменить" name="go">
        </div >
    </fieldset>
</form>