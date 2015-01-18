<?php
/**
 * core/MY_Controller.php
 *
 * Default application controller
 */

class Application extends CI_Controller {
    protected $data = array();      // parameters for view components
    protected $id;		  // identifier for our content
    protected $choices = array(// our menu navbar
	'Home' => '/', 'Contact' => '/contact', 'About'=>'/about', 
        'Features' => '/features', 'News' => '/news', 'Post'=>'/post'
    );
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
	parent::__construct();
	$this->data = array();
	$this->data['pagetitle'] = 'ZeroType';
    }
    /**
     * Render this page
     */
    function render()
    {        
	$this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
	$this->data['data'] = &$this->data;
	$this->parser->parse('template', $this->data);
    }
}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */