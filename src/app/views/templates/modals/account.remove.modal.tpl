{if isset($smarty.session.ERRORS.CONDITION) || isset($smarty.session.ERRORS.INVALID_PASSWORD)}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new bootstrap.Modal(document.getElementById('confirmRemoveModal')).show();
        });
    </script>
{/if}

<section class="modal fade" id="confirmRemoveModal" tabindex="-1" aria-labelledby="confirmRemoveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <section class="modal-content">
            <section class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="confirmRemoveLabel">Eliminar Cuenta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </section>
            <section class="modal-body">
                <p class="fs-5"><strong>Esta acción no se puede deshacer.</strong></p>

                <form id="remove-form" {if isset($smarty.session.AUTH.USER_ID)} action="remove/account/{$smarty.session.AUTH.USER_ID} {/if}" method="POST">
                    <div class="form-check mb-3">
                        <label for="condtion" class="form-check-label fs-5 text-dark">Acepto eliminar mi cuenta</label>
                        <input type="checkbox" class="form-check-input" name="condition" id="condition" required>
                        {if isset($smarty.session.ERRORS.CONDITION)}
                            <p class="text-danger mt-1">{$smarty.session.ERRORS.CONDITION}</p>
                        {/if}
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-5 text-dark">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Escribe tu contraseña:" required>
                        {if isset($smarty.session.ERRORS.INVALID_PASSWORD) && !empty($smarty.session.ERRORS.INVALID_PASSWORD)}
                            <p class="text-danger mt-1" id="error_invalid_password_text">{$smarty.session.ERRORS.INVALID_PASSWORD}</p>
                        {/if}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="account_modal_cancel_btn">Cancelar</button>
                    </div>
                </form>
            </section>
        </section>
    </div>
</section>

