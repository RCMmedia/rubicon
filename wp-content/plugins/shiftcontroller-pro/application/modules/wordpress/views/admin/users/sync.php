<?php
$this->layout->set_partial(
	'header', 
	HC_Html::page_header(
		HC_Html_Factory::element('h2')
			->add_child( $app_title . ': Installation' )
			->add_child( '<br>' )
			->add_child( 
				HC_Html_Factory::element('small')
					->add_child( 'Import User Accounts' )
				)
		)
	);

$out = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-unstyled')
	->add_attr('class', 'list-separated')
	;

if( isset($offer_upgrade) && $offer_upgrade ){
	$link = HC_Lib::link('setup/upgrade');
	$out->add_item(
		HC_Html_Factory::element('a')
			// ->add_attr('class', array('btn', 'btn-default'))
			->add_attr('href', $link->url())
			->add_child('You seem to have an older version already installed. Click here to upgrade.')
		);
	$out->add_item(
		'continue',
		'Or continue below to install from scratch.'
		);
	$out->add_item_attr(
		'continue',
		'style', 'margin-bottom: 1em;'
		);
}

$out->add_item(
	'Import user accounts from WordPress into ' . $app_title . '.'
	);

$link = HC_Lib::link($post_to);

$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', $link->url() )
	->add_attr('class', 'form-horizontal')
	->add_attr('class', 'form-condensed')
	;

$table = HC_Html_Factory::widget('table')
	->add_attr('class', array('table', 'table-striped', 'table-condensed'))
	;
$table->set_header(
	array(
		'WordPress',
		$app_title
		)
	);

foreach( $wordpress_roles as $role_value => $role_name ){
	$this_role_count = ( isset($wordpress_count_users['avail_roles'][$role_value]) ) ? $wordpress_count_users['avail_roles'][$role_value] : 0;
	$row = array();
	$row[] = $role_name . ' [' . $this_role_count . ']';

	if( $role_value ){
		if( $role_value == 'administrator' ){
			$default = USER_HC_MODEL::LEVEL_ADMIN;
		}
		else {
			if( $this_role_count )
				$default = USER_HC_MODEL::LEVEL_STAFF;
			else
				$default = 0;
		}
	}
	else {
		$default = 0;
	}

	$field_name = 'role_' . $role_value;
	$options = array(
		USER_HC_MODEL::LEVEL_ADMIN		=> HCM::__('Admin'),
		USER_HC_MODEL::LEVEL_MANAGER	=> HCM::__('Manager'),
		USER_HC_MODEL::LEVEL_STAFF		=> HCM::__('Staff'),
		0								=> HCM::__('Do Not Import'),
		);

	$row[] = $form->input($field_name)
		->set_options($options)
		->set_default($default)
		;
	$table->add_row($row);
}

/*
$row = array();
$row[] = '';
$row[] = $form->input('append_role_name') . 'Append Original Role Name To Staff Name (Like "Subscriber John Doe")';
$table->add_row($row);
*/

$buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated') )
	;
$buttons->add_item(
	HC_Html_Factory::element('input')
		->add_attr('type', 'submit')
		->add_attr('class', array('btn', 'btn-primary'))
		->add_attr('title', HCM::__('Sync Users') )
		->add_attr('value', HCM::__('Sync Users') )
	);

$row = array();
$row[] = '';
$row[] = $buttons;
$table->add_row($row);

$display_form->add_item( $table );

$out->add_item( $display_form );
echo $out->render();
?>