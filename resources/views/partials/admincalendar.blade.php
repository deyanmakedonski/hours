<div id='admincalendar'></div>
<!-- Modal -->
<div class="modal fade" id="hourElements" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Запазване на час</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="select-service"></div>
                </div>
                <div class="form-group">
                    <label name="personal" for="recipient-name" class="control-label">Служител:</label>
                    <select class="form-control selected-user" placeholder="Изберете процедура!">
                        <option value="" selected>Изберете услуга!</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Клиент:</label>
                    <input name="client" type="text" value='' class="form-control" id="client">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id="submit" >Избери</button>
            </div>
        </div>
    </div>
</div>