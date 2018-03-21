<div id="search-person" class="modal modal-footer" style="width:1000px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    $activepeople = TPerson::model()->findAll("status = 'D'");
    ?>
    <a><i class="material-icons small modal-action modal-close right" style="color: #000">cancel</i></a>
    <div class="modal-content white">
                <table id="example2" class="display responsive-table datatable-example">
                    <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                    <tfoot><tr></br></tr></tfoot>
                    <tbody>
                        <?php
                        if (!empty($activepeople)) {
                            $countryname = '';
                            foreach ($activepeople as $activeperson) {
                                $pcode = $activeperson->Nationality;
                                $country = TCountry::model()->findByAttributes(array('code'=>$pcode));
                                $countryname = $country->name;        
                                ?>
                                <tr>
                                    <td>
                                        <div id="web">
                                            <div class="search-result">
                                                <a class="search-result-title">
                                                    <span class="grey-text">Name &rtrif;</span>
                                                    <?php echo $activeperson->Name; ?></a><br>
                                                <a class="search-result-link black-text">
                                                    <span class="attachment-info ">
                                                        <span class="grey-text">Gender &rtrif;</span>
                                                        _________</span> &nbsp;&nbsp;&nbsp;
                                                    <span class="attachment-info" style="margin-left:10px;">
                                                        <span class="grey-text">Nationality &rtrif;</span>
                                                        <?php echo $countryname; ?></span>&nbsp;&nbsp;&nbsp;
                                                    <span class="attachment-info black-text" style="margin-left:10px;">
                                                        <span class="grey-text">Created ON &rtrif;</span>
                                                        <?php echo $activeperson->Createdon; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } ?>                                        
                    </tbody>
                </table>
        <?php ?>
    </div>
    <?php $this->endWidget(); ?>
</div> 