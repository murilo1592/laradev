<h1>Listagem de Imóveis</h1>

<p>
    <a href="<?= url('/imoveis/novo'); ?>">Cadastrar Novo Imóvel</a>
</p>

<?php

if (!empty($properties)) {

    echo "<table>";

    echo "<tr>
             <td>Título</td>
             <td>Valor Locação</td>
             <td>Valor de Compra</td>
             <td>Ações</td>
           </tr>";

    foreach ($properties as $property) {

        $linkReadMore = url('imoveis/' . $property->name);
        $linkEditMore = url('imoveis/editar/' . $property->name);
        $linkRemoveMore = url('imoveis/remover/' . $property->id);

        echo "<tr>
                <td>{$property->title}</td>
                <td> R$ ".number_format($property->rental_price, 2, ',', '.')."</td>
                <td> R$ ".number_format($property->sale_price, 2, ', ', '.')."</td>
                <td><a href='{$linkReadMore}'>Ver Mais</a> | <a href='{$linkEditMore}'>Editar</a> | <a href='{$linkRemoveMore}'>Remover</a> </td>
              </tr>";

    }

    echo "</table>";
}
