<h1>Formulário de Edição - Imóveis</h1>

<form action="<?= url('/imoveis/update', ['id' => $property->id]); ?>" method="post">

    <?= csrf_field();?>
    <?= method_field('PUT');?>

    <label for="text">Título</label>
    <input type="text" name="title" id="title" value="<?= $property->title; ?>"/>

    <br>

    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= $property->description; ?></textarea>

    <br>

    <label for="rental_price">Valor de Locação</label>
    <input type="rental_price" name="rental_price" id="rental_price" value="<?= $property->rental_price; ?>"/>

    <br>

    <label for="sale_price">Valor de Compra</label>
    <input type="sale_price" name="sale_price" id="sale_price" value="<?= $property->sale_price;?>"/>

    <br>

    <button type="submit">Atualizar Imóvel</button>
</form>
