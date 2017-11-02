            <div class="form-group data1" id="select3">
              <label class="col-md-4 control-label" for="l_t_id">Выберите преподавателя</label>  
                <div class="col-md-4">
                    <select class="form-control" name="l_t_id" id="l_t_id" required="" title="Преподаватель">
                      <option value="0"></option>
                      <?php while($teacher = $teachers->fetch_assoc()){?>
                        <option value="<?=$teacher['t_id']?>"><?=$teacher['t_second_name'].' '.$teacher['t_first_name'].' '.$teacher['t_third_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>