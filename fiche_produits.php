<?php
include("./header_admin.php");

try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->query('SELECT * FROM t_produit');
    $res = $req->fetchAll();


    echo "<div class='container'>";
    echo "<h2>Affichage des Articles</h2>";
    echo "<table class='table table-bordered table-danger'>";
    echo "<thead class='thead-danger'>
        <tr class='table-warning'>
          <th scope='col'>id_produit</th>
          <th scope='col'>Reference</th>
          <th scope='col'>Categorie</th>
          <th scope='col'>Titre</th>
          <th scope='col'>Description</th>
          <th scope='col'>Couleur</th>
          <th scope='col'>Taille</th>
          <th scope='col'>Public</th>
          <th scope='col'>Photo</th>
          <th scope='col'>Prix</th>
          <th scope='col'>stock</th>
          <th scope='col' >Modification</th>
          <th scope='col'>Supression</th>     
        </thead>";

    echo "<tbody>";
    foreach ($res as $key => $value) {
        echo "<tr>
        <td align='center'>$value[0]</td>
        <td align='center'>$value[1]</td>
        <td align='center'>$value[2]</td>
        <td>$value[3]</td>
        <td>$value[4]</td>
        <td>$value[5]</td>
        <td align='center'>$value[6]</td>
        <td align='center' >$value[7]</td>
        <td>$value[8]</td>
        <td>$value[9]€</td>
        <td>$value[10]</td>  
        <td align='center'><a href='form_modif.php?id=$value[0]'class='text-decoration-none text-dark'><svg xmlns='http://www.w3.org/2000/svg 'width='30' height='30' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg></a></td>
          <td align='center'><a href='form_modif.php?id=$value[0]'class='text-decoration-none text-dark'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
          <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
          <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
        </svg></a></td>
      </tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


include("../inc/footer.inc.php");
