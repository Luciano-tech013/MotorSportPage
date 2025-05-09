<section class="modal fade" id="infoCategoryRemoveModal" tabindex="-1" aria-labelledby="infoCategoryRemoveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <section class="modal-content">
            <section class="modal-header bg-dark text-white flex-column align-items-start">
            <h5 class="modal-title text-danger" id="infoCategoryRemoveLabel">
            {if isset($errors.INVALID_CATEGORY_DELETABLE)} 
                {$errors.INVALID_CATEGORY_DELETABLE} 
            {/if}
            </h5>
    
            {if isset($errors.INVALID_CATEGORY_DELETABLE_DATA)}
                <ul class="mt-2">
                {foreach from=$errors.INVALID_CATEGORY_DELETABLE_DATA item=$car}
                    <li>{$car->name} | {$car->brand}</li>
                {/foreach}
                </ul>
            {/if}
            </section>
            <section class="modal-body">
                <p>Al eliminar esta categoría, también se eliminarán todos los <strong>autos asociados a ella</strong>. Tenga en cuenta que <strong>NO hay vuelta atrás</strong> una vez que la categoría haya sido eliminada, por lo tanto, la <strong>decisión</strong> queda bajo su <strong>responsabilidad</strong>.<br><strong>¿Realmente desea eliminarla?</strong></p>
            </section>
            <section class="modal-footer">
                <form class="g-3 mt-2" method="POST" {if isset($smarty.session.CATEGORY.ID_DELETABLE)} action="remove/category/{$smarty.session.CATEGORY.ID_DELETABLE}" {/if}>
                    <input type="hidden" name="cascade_delete" value="1">
            
                    <button type="submit" class="btn btn-danger">Si, acepto eliminar la categoria</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Cerrar">Cancelar operacion</button>
                </form>
            </section>
        </section>
    </div>
</section>