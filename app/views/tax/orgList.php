<table>
    <thead>
        <tr id="head_tr">
            <th>Название фирмы</th>
            <th>ИНН</th>
            <th>Код ОКВЭД</th>
            <th>Непрервный цикл</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>

        <?php
            //var_dump($orgList);
            uasort($orgList, function($a, $b){
                return $a['organization_name'] <=> $b['organization_name'];
            });

            foreach($orgList as $org) { ?>

                <tr>
                    <td><?php echo $org['organization_name']?></td>
                    <td><?php echo $org['inn']?></td>
                    <td><?php echo $org['okved']?></td>
                    <td><?php echo $org['always'] == '1' ? 'да' : 'нет' ?></td>
                    <td><?php echo "<a class=\"btn\" href=\"/tax/update?id={$org['id']}&organization={$org['organization_name']}&inn={$org['inn']}&org_okved={$org['okved']}\">Редактировать</a>" ?></td>
                    <td><?php echo "<a class=\"btn btn--del\" href=\"/tax/delete?id={$org['id']}\">Удалить</a>" ?></td>
                </tr>
        
            <?php } ?>

    </tbody>
</table>

