<!-- /view/Usuario/listar.php -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($usuarios as $u){
        echo '<tr>';
        echo "<td>$u->id</td>";
        echo "<td>$u->nome</td>";
        echo "<td>$u->email</td>";
        echo '</tr>';

    }
    ?>
  </tbody>
</table>