<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="get" action="/">
            {html_options name="publisher" options=$pubs selected=$pubId}
            <input type="submit" name="submit" value="Refresh">
        </form>
        
        <table>
            {foreach from=$books item=$b}
                <tr>
                    <td>{$b->id}</td>
                    <td>{$b->name|escape}</td>
                    <td>{$b->date->format('d.m.Y')}</td>
                    <td>{$b->publisher}</td>
                </tr>
            {/foreach}
        </table>
    </body>
</html>
