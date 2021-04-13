<?php
namespace Adnan\UIGrid\Model\Config\Source;

class Checkbox implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'checkbox1', 'label'=>__('Checkbox1')]
            // ,
            // ['value' => 'checkbox2', 'label'=>__('Checkbox2')]
        ];
    }
}