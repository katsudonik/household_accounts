<?php
App::uses('HtmlHelper', 'View/Helper');

class MyHtmlHelper extends HtmlHelper {

    private $defaultCssClass = array(
        'trn',
    );

    public function link($title, $url = null, $options = array(), $confirmMessage = false) {
        $this->mergeDefaultCssClass($options);
        return parent::link($title, $url, $options, $confirmMessage);
    }

    private function mergeDefaultCssClass(&$options) {
        $classes = isset($options['class']) ? explode(" ", $options['class']) : array();
        $options['class'] = array_unique(array_merge($classes, $this->defaultCssClass));
    }
}