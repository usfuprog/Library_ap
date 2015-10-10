<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <? foreach($books as $book) { ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><?= $book->name ?></td>
                    <td><?= $book->date ?></td>
                </tr>
            <? } ?>
        </table>
    </body>
</html>
