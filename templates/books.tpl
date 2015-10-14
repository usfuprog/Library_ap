<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            {foreach from=$books item=b}
                <tr>
                    <td>{$b->id}</td>
                    <td>{$b->name|escape}</td>
                    <td>{$b->date->format('d.m.Y')}</td>
                </tr>
            {/foreach}
        </table>
    </body>
</html>
