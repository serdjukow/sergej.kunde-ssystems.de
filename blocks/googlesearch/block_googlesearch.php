<?php

/**
 * Google search block.
 *
 * @package    block_googlesearch
 */

defined('MOODLE_INTERNAL') || die();

class block_googlesearch extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_googlesearch');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();

        $this->content->text  = html_writer::start_tag('div', array('class' => 'searchform'));
		$this->content->text .= html_writer::start_tag('script', array('async' => 'async', 'src' => 'https://cse.google.com/cse.js?cx=25219c415e5991204'));
		
		$this->content->text .= html_writer::end_tag('script');
        $this->content->text .= html_writer::start_tag('div', array('class' => 'gcse-search'));

        $this->content->text .= html_writer::end_tag('div');
        $this->content->text .= html_writer::end_tag('div');

        return $this->content;
    }
}