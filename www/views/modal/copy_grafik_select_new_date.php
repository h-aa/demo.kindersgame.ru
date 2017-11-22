<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
            <div id="selectDateModalBox" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Выберите дату</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="post" action="/copy_grafik">
                            <input type="hidden" id="date_copy" name="date_copy">
                            <div class="form-group">
                            <label class="col-md-6 control-label" for="t_phone">На какую дату копировать</label>  
                                <div class="col-md-4">
                                <input id="new_date" name="new_date" type="text" class="form-control input-md date" required>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" id="btn" class="btn btn-primary btn-block">Копировать расписание</button>
                            </div>  
                            </div>
                        </form>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                    </div>
                </div>
            </div>