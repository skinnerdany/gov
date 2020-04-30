<form action="/tax/peopletaxadd" method="get">
<fieldset>
        <legend>Привязать человека к работе</legend>
        <div class="input_block">
            <label for="passport">Паспорт: </label>
            <input type="text" name="passport" id="passport" value="<?php echo $passport ?? '' ?>">
        </div>
        <div class="input_block">
            <label for="inn">ИНН:</label>
            <input type="text" name="inn" id="inn" value="<?php echo $inn ?? '' ?>">
        </div>
        <div class="sbm_btn">
            <input type="submit" value="Добавить" name="go">
        </div >
    </fieldset>
</form>