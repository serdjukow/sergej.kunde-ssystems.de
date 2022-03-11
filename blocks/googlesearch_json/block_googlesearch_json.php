<?php

defined('MOODLE_INTERNAL') || die();

class block_googlesearch_json extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_googlesearch_json');
    }

    /**
     * Gets the block contents.
     *
     * If we can avoid it better not check the server status here as connecting
     * to the server will slow down the whole page load.
     *
     * @return string The block HTML.
     */
    public function get_content() {
        global $OUTPUT;
        if ($this->content !== null) {
            return $this->content;
        }

		

        $this->content = new stdClass();
 
        $this->content->text  = html_writer::start_tag('div', array('class' => 'searchform'));
        $this->content->text .= html_writer::start_tag('form', array('id' => 'search', 'action' => ''));
        $this->content->text .= html_writer::start_tag('fieldset', array('action' => 'invisiblefieldset'));

        $this->content->text .= html_writer::tag('label', get_string('search', 'search'),
            array('for' => 'searchform_search', 'class' => 'accesshide'));
        $inputoptions = array('id' => 'searchform_search', 'name' => 'search-block-value', 'class' => 'form-control',
            'type' => 'text', 'size' => '15');
        $this->content->text .= html_writer::empty_tag('input', $inputoptions);

        
        if ($this->page->context && $this->page->context->contextlevel !== CONTEXT_SYSTEM) {
            $this->content->text .= html_writer::empty_tag('input', ['type' => 'hidden',
                    'name' => 'context', 'value' => $this->page->context->id]);
        }
        
        $this->content->text .= html_writer::tag('button', get_string('search', 'search'),
            array('id' => 'custom-serch_button', 'type' => 'submit', 'title' => 'googlesearch_json', 'class' => 'btn btn-secondary'));
        $this->content->text .= html_writer::end_tag('fieldset');
        $this->content->text .= html_writer::end_tag('form');
        $this->content->text .= html_writer::end_tag('div');

		$this->content->text .= html_writer::start_tag('script', array('defer' => 'defer', 'src' => gethostbyaddr() . '/blocks/googlesearch_json/js/main.js'));
		
		$this->content->text .= html_writer::end_tag('script');
        return $this->content;		
    }

	
}