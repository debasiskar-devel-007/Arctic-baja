<?php 

                $mon = array(''=>'MM','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12');

                $y = date('Y');
                $year[''] = 'YYYY';
                for($i=$y-1;$i<$y+30;$i++){
                    $year[$i] =$i;
                }


                /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'autoupForm',
                'type'=>'horizontal',
                'enableClientValidation'=>true,
                'enableAjaxValidation'=>true,
        'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                ))); ?>
            <div class="form-contain">

                <?php echo $form->textFieldRow($model, 'card_no'); ?>
                <?php echo $form->dropDownListRow($model, 'card_exp_mon',$mon)?>  
                <?php echo $form->dropDownListRow($model, 'card_exp_year',$year)?>  
                <?php echo $form->textFieldRow($model, 'card_cvv'); ?>

            </div>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit','htmlOptions'=>array('class'=>'btn','onclick'=>'send()'))); ?>
            

<?php $this->endWidget(); ?>