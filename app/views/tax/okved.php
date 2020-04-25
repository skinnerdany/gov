<?php
    foreach(core::app()->input->get as $name => $value){
        $$name = $value;
    }

    if(isset($always)){
        $always = 'checked';
    }
?>

<form action="/tax/addOkved" method="GET">
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