
<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Серия, номер паспорта</th>
      <th scope="col">Государственный номер ТС</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
<?php 
if (!empty($records)){
    foreach ($records as $index =>$record) {
        echo '<tr>';
        echo '<th scope="row">'.++$index.'</th>';
        echo '<td>'.$record['passport'].'</td>';
        echo '<td>'.$record['number'].'</td>';
        echo '<td><a href="index.php?controller=gibdd&action=add&number='.$record['number'].'">Редактировать</a><br> Удалить</td>';
        echo '</tr>';
    }
}else {
    echo '<tr>';
    echo '<td colspan="4" style="text-align:center">Нет записей</td>';
    echo '</tr>';

}
    

?>
  </tbody>
</table>