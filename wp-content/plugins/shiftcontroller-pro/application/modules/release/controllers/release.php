<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Release_HC_Controller extends _Front_HC_Controller
{
	function todo()
	{
		$shifts = HC_App::model('shift')
			->where('release_request', 1)
			;

		$shifts->get();
		$count = $shifts->result_count();

		if( ! $count ){
			return;
		}

	/* render view */
		$this->layout->set_partial(
			'content', 
			$this->render( 
				'release/todo',
				array(
					'count'	=> $count,
					)
				)
			);

		$this->layout();
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */