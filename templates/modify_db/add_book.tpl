<div>
    </br>
    {if $smarty.post.modify_db == "Add book"}
        <form method="get" action="/Book/Add">
            <input type='text' name='book_name' />
            <span> < < < Book name </span>
            </br>
            <input type='text' name='author_name' />
            <span> < < < Author`s name</span>
            </br>
            <input type='text' name='author_surname' />
            <span> < < < Author`s surname</span>
            </br>
            <input type='text' name='author_birthdate' />
            <span> < < < Author`s birthdate</span>
            </br>
            <input type='text' name='publisher_name' />
            <span> < < < Publisher </span>
            </br>
            <input type='text' name='category' />
            <span> < < < Categorie </span>
            </br>
            <input type='text' name='date' />
            <span> < < < Date </span>
            </br>
            <input type='text' name='pages' />
            <span> < < < Pages count </span>
            </br>
            
            </br>
            <input type="submit" value="Done">
        </form>
        <form method="POST" action="{$smarty.server.REQUEST_URI}">
            <input type="submit" value="Cancel" name="modify_db" />
        </form>
    {else}
        <form method="POST" action="{$smarty.server.REQUEST_URI}">
            <input type="submit" value="Add book" name="modify_db" />
        </form>
    {/if}
</div>
