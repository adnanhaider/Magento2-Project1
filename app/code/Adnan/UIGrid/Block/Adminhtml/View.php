<?php
namespace Adnan\UIGrid\Block\Adminhtml;

use Magento\Backend\Block\Template;

class View extends Template
{
   public $_template = 'Aureatelabs_Grid::view.phtml';

     public function __construct(
       \Magento\Backend\Block\Template\Context $context
   ) {
       parent::__construct($context);
   }
}