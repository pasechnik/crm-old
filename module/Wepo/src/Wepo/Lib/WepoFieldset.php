<?php

namespace Wepo\Lib;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class WepoFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $_name = '';

    public function parseConfig(\Wepo\Model\ConfigForm $config, array $fieldsets)
    {
        $this->_name = $config->name;
        $this->setName($config->group);
        $this->setOptions($config->options);
        foreach ($config->attributes as $_k => $_v) {
            $this->setAttribute($_k, $_v);
        }
        foreach ($config->fieldsets as $_k => $_v) {
            if (!empty($_v[ 'options' ])) {
                $fieldsets[ $_k ]->setOptions($_v[ 'options' ]);
            }
            $this->add($fieldsets[ $_k ]);
        }
        foreach ($config->elements as $_k => $_v) {
            $this->add($_v);
        }

        return $this;
    }

    public function getConfig()
    {
        $wrs    = preg_split('/\\\/', get_class($this), -1, PREG_SPLIT_NO_EMPTY);
        $result = [
            'name'       => empty($this->_name) ? array_pop($wrs) : $this->_name,
            'group'      => $this->getName(),
            'type'       => 'fieldset',
            'options'    => $this->getOptions(),
            'attributes' => $this->getAttributes(),
            'fieldsets'  => [ ],
            'elements'   => [ ],
        ];
        $label  = $this->getLabel();
        if (!empty($label)) {
            $result[ 'options' ][ 'label' ] = $this->getLabel();
        }
        foreach ($this->getFieldsets() as $_k => $_fieldset) {
            $wrs                                       = preg_split('/\\\/', get_class($_fieldset), -1, PREG_SPLIT_NO_EMPTY);
            $result[ 'fieldsets' ][ $_k ][ 'type' ]    = array_pop($wrs);
            $result[ 'fieldsets' ][ $_k ][ 'options' ] = $_fieldset->getOptions();
        }
        foreach ($this->getElements() as $_k => $_element) {
            $result[ 'elements' ][ $_k ][ 'type' ]       = get_class($_element);
            $result[ 'elements' ][ $_k ][ 'attributes' ] = $_element->getAttributes();
            $result[ 'elements' ][ $_k ][ 'options' ]    = $_element->getOptions();
        }

        return $result;
    }

    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            ),
        );
    }
}
