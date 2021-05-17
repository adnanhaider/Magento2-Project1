<?php
namespace Adnan\UIGrid\Block\Adminhtml\Item\Add\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Adnan\UIGrid\Block\Adminhtml\Item\Add\Button\GenericButton;
/**
* Class SaveButton
*/
class SaveButton extends GenericButton implements ButtonProviderInterface{
    /**
    * @return array
    */
    public function getButtonData(){
        return [
        'label' => __('Save'),
        'class' => 'save primary',
        'data_attribute' => [
            'mage-init' => ['button' => ['event' => 'save']],
            'form-role' => 'save',
            ],
        'sort_order' => 90,
        ];
    }
}