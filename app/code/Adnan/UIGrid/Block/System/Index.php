<?php
namespace Adnan\UIGrid\Block\System;
use Magento\Framework\Webapi\Rest\Request\Deserializer\Json\Deserializer;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_coreRegistry;
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\Serialize\Serializer\Json $json,
        \Adnan\UIGrid\Helper\Data $helperData,
        array $data=[])
	{
        $this->json = $json;
        $this->_coreRegistry = $coreRegistry;
        $this->helperData = $helperData;
		parent::__construct($context);
	}

	public function getHelperData(){

        $data = [
            'enable' => $this->helperData->getGeneralConfig('enable'),
            'custom_label'=> $this->helperData->getGeneralConfig('custom_label'),
            'languages'=> $this->helperData->getGeneralConfig('languages'),
            'ranges'=> $this->helperData->getGeneralConfig('ranges'),
            'first_language'=> $this->helperData->getGeneralConfig('first_language'),
            'pakistani'=> $this->helperData->getGeneralConfig('pakistani')? "Pakistani": "non-Pakistani",
            'textarea_example'=> $this->helperData->getGeneralConfig('textarea_example'),
            'checkbox'=> $this->helperData->getGeneralConfig('checkbox'),
        ];
        // var_dump(($data));die('l');
        return $data;
	}
}