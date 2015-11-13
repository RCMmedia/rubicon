<?php
class SFT_Html_Widget_Availability_View extends HC_Html_Element
{
	private $model = NULL;
	private $new_window = FALSE;
	private $nolink = FALSE;
	private $start_link = NULL;
	private $wide = FALSE;

	function set_wide( $wide = TRUE )
	{
		$this->wide = $wide;
		return $this;
	}
	function wide()
	{
		return $this->wide;
	}

	function set_model( $model )
	{
		$this->model = $model;
		return $this;
	}
	function model()
	{
		return $this->model;
	}

	function set_nolink( $nolink = TRUE )
	{
		$this->nolink = $nolink;
		return $this;
	}
	function nolink()
	{
		return $this->nolink;
	}

	function set_start_link( $start_link = TRUE )
	{
		$this->start_link = $start_link;
		return $this;
	}
	function start_link()
	{
		return $this->start_link;
	}

	function set_new_window( $new_window = TRUE )
	{
		$this->new_window = $new_window;
		return $this;
	}
	function new_window()
	{
		return $this->new_window;
	}

	function render()
	{
		$model = $this->model();
		$start_link = $this->start_link();
		if( ! $start_link ){
			// $start_link = 'availability';
			$start_link = 'admin/users/zoom/index/id/' . $model->user_id . '/tab/availability/_pass';
		}

		$href = HC_Lib::link($start_link . '/zoom/index', array('id' => $model->id));
		$nolink = $this->nolink();
		$new_window = $this->new_window();
		$wide = $this->wide();


		$a_link = HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', $href)
			;
		if( ! $new_window ){
			$a_link->add_attr('class', 'hc-flatmodal-loader');
		}
		else {
			$a_link->add_attr('target', '_blank');
			$a_link->add_attr('class', 'hc-parent-loader');
		}

		if( $wide === 'mini' ){
			$out = HC_Html_Factory::element('div');
			if( ! $nolink ){
				$title = clone $a_link;
				$title->add_child( $model->present_title(HC_PRESENTER::VIEW_HTML_ICON) );
			}
			else {
				$title = $model->present_title(HC_PRESENTER::VIEW_HTML_ICON);
			}
			$out->add_child( $title );
		}
		elseif( $wide ){
			$out = HC_Html_Factory::widget('grid');
			if( ! $nolink ){
				$present_title = clone $a_link;
				$present_title->add_child( $model->present_title() );
			}
			else {
				$present_title = $model->present_title();
			}

			if( ! $nolink ){
				$present_date = clone $a_link;
				$present_date->add_child( $model->present_date() );
			}
			else {
				$present_date = $model->present_date();
			}

			$out->add_item(
				$present_title,
				6
				);
			$out->add_item(
				$present_date,
				6
				);
		}
		else {
			$out = HC_Html_Factory::element('div');
			if( ! $nolink ){
				$title = clone $a_link;
				$title->add_child( $model->present_title() );
			}
			else {
				$title = $model->present_title(HC_PRESENTER::VIEW_HTML_ICON);
			}
			$out->add_child( $title );
			$out
				->add_attr('class', array('text-smaller'))
				->add_attr('class', array('text-muted'))
				;
		}

		$out
			->add_attr('class', 'hc-common-link-parent')
			->add_attr('class', 'hc-no-underline')
			;
		return $out->render();
	}
}