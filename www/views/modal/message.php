<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
            <div id="messageModalBox" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Успешно!</h4>
                </div>
                <div class="modal-body">
                    <?=$message_data?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
                </div>
            </div>
            </div>