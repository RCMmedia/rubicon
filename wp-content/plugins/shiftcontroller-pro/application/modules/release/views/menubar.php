<?php
if( $object->release_request ){
	$label = HC_Html::icon('sign-out') . HCM::__('Shift Release Pending');
}
else {
	$label = HC_Html::icon('sign-out') . HCM::__('Release Shift');
}
echo $label;
?>