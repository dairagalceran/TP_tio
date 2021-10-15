{include file='templates/header.tpl'}

<div class="row mt-4">
    <div class="col-md-4">
        <h1>{$tituloform}</h1>
        {include file='templates/formAlta.tpl'}
    </div>
    <div class="col-md-8">
        <h1>{$titulo}</h1>
        <ul class="list-group">
            {foreach from=$tasks item=$task}
                <li class="
                    list-group-item
                    d-flex">
                </li>
            {/foreach}
        </ul>
    </div>
</div>

{include file='templates/footer.tpl'}
