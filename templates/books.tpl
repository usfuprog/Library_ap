<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="get" action="/Book/Index">
            {html_options name="catId" options=$cats selected=$catId}
            {html_options name="pubId" options=$pubs selected=$pubId}
            <input type="submit" value="Refresh">
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Publisher</th>
                </tr>
            </thead>
            {foreach from=$books item=$b}
                <tr>
                    <td>{$b->id}</td>
                    <td>{$b->name|escape}</td>
                    <td>{$b->date->format('d.m.Y')}</td>
                    <td>{$b->category}</td>
                    <td>{$b->publisher}</td>
                </tr>
            {/foreach}
        </table>
    </body>
</html>
