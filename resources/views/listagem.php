<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/bootstrap.css" rel="stylesheet">
        <title>Controle de estoque</title>
    </head>
    <body>
        <div class="container">
        <h1>Listagem de produtos</h1>
        <table class="table">
        <?php foreach ($produtos as $p): ?>
        <tr>
            <td><?= $p->nome ?></td>
            <td><?= $p->valor?></td>
            <td><?= $p->descricao ?></td>
            <td><?= $p->quantidade ?></td>
            <td>
                <a href="/produtos/mostra>">
                    <span class="glyphicon glyphicon-search"></span>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
        </table>
        </div>
    </body>
</html>