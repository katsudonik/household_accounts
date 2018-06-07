<?php
App::uses('HtmlHelper', 'View/Helper');

class MyHtmlHelper extends HtmlHelper {

    public function link($title, $url = null, $options = array(), $confirmMessage = false) {
        $this->mergeDefaultCssClass($options);
        return parent::link($title, $url, $options, $confirmMessage);
    }
}