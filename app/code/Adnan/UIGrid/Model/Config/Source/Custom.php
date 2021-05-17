<?php
namespace Adnan\UIGrid\Model\Config\Source;

class Custom implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => "English", 'label' => __('English')],
            ['value' => "Urdu", 'label' => __('Urdu')],
            ['value' => "French", 'label' => __('French')],
        ];
    }
}