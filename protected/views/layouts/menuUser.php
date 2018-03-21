<li class="no-padding">
    <a class="waves-effect waves-grey"><i class="material-icons">perm_identity</i>My Profile</a>
</li>
<li class="no-padding">
    <a class="waves-effect waves-grey"><i class="material-icons">vpn_key</i>Change Password</a>
</li>
<li class="no-padding">
    <a class="waves-effect waves-grey"><i class="material-icons">query_builder</i>System Logs</a>
</li>
<li class="divider"></li>
<li class="no-padding">
    <?php echo CHtml::link('<i class="material-icons">exit_to_app</i> Sign Out', array('user/logout'), $htmlOptions=array('class'=>'waves-effect waves-grey')); ?>
</li>