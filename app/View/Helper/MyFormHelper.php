<?php
App::uses('FormHelper', 'View/Helper');

class MyFormHelper extends FormHelper {

    public function input($fieldName, $options = array()) {

        $options = isset($options['label']) ? $options : array_merge($options, ['label' => ['text' => $fieldName]]);
        $this->mergeDefaultCssClass($options['label']);
        return parent::input($fieldName, $options);
    }
}