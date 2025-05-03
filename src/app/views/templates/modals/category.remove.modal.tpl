<section class="modal fade" id="infoCategoryRemoveModal" tabindex="-1" aria-labelledby="infoCategoryRemoveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <section class="modal-content">
            <section class="modal-header bg-dark text-white">
                <h5 class="modal-title text-danger" id="confirmRemoveLabel">{if isset($smarty.session.ERRORS.INVALID_DELETABLE)} {$smarty.session.ERRORS.INVALID_DELETABLE} {/if}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </section>
            <section class="modal-body">
                <p class="fs-5"><strong>Debe eliminar del sistema esos autos para poder eliminar ésta categoría</strong></p>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
            </section>
        </section>
    </div>
</section>