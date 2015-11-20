<div>
    </br>
    {if $show_form}
        <span>Add book</span>
        <form method="POST" action="/Book/modify_db/">
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
            <input type="submit" value="Done" name="add_book">
        </form>
        <form method="POST" action="{$smarty.server.REQUEST_URI}">
            <input type="submit" value="Cancel" name="add_book" />
        </form>
        {else}
            <form method="POST" action="/Book/modify_db/" target="_blank">
                <input type="submit" value="Add book" name="add_book" />
            </form>
        {/if}
</div>
