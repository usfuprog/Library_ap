<div>
    <form method="get" action="/Book/Index">
        {html_options name="catId" options=$cats selected=$catId}
        {html_options name="pubId" options=$pubs selected=$pubId}
        {html_options name="authId" options=$auth selected=$authId}
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
                <th>Authors</th>
                <th>Edit</th>
                <th>Delete</th>
                <th></th>
            </tr>
        </thead>
        {foreach from=$books item=$b}
            <tr>
                <td>{$b->id}</td>
                <td>{$b->name|escape}</td>
                <td>{$b->date->format('d.m.Y')}</td>
                <td>{$b->category}</td>
                <td>{$b->publisher}</td>
                <td>{foreach from=$b->authors item=$a}{$a}<br />{/foreach}</td>
                <form method="POST" action="/Book/modify_db/" target="_blank">
                    <td><input type='checkbox' name='edit_now' /></td>
                    <td><input type='checkbox' name='delete_now' /></td>
                    <td><input type="submit" value="Go" name="book_id"></td>
                    <input type='hidden' value={$b->id} name="book_id" />
                </form>
            </tr>
        {/foreach}
    </table>
    {include file='modify_db/add_book.tpl'}
</div>
