<section class="modal fade" id="infoCategoryRemoveModal" tabindex="-1" aria-labelledby="infoCategoryRemoveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <section class="modal-content">
            <section class="modal-header bg-dark text-white">
                <h5 class="modal-title text-danger" id="infoCategoryRemoveModal">{if isset($smarty.session.ERRORS.INVALID_DELETABLE)} {$smarty.session.ERRORS.INVALID_DELETABLE} {/if}</h5>
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