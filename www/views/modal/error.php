<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
            <div id="errorModalBox" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ошибка!</h4>
                </div>
                <div class="modal-body">
                    <?=$error_data?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
                </div>
            </div>
            </div>