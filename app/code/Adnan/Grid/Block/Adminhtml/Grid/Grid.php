<?php 
namespace Adnan\Grid\Block\Adminhtml\Grid;
use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data;
use Magento\Framework\Registry;
use Magento\Framework\ObjectManagerInterface;
use Adnan\Grid\Model\ResourceModel\Item\CollectionFactory as DemoCollection;
// also you can use Magento Default CollectionFactory
class Grid extends Extended
{
	protected $registry;
	protected $_objectManager = null;
	protected $demoFactory;
	public function __construct(
		Context $context,
		Data $backendHelper,
		Registry $registry,
		ObjectManagerInterface $objectManager,
		DemoCollection $demoFactory,
		array $data = []
	) {
		$this->_objectManager = $objectManager;
		$this->registry = $registry;
		$this -> demoFactory = $demoFactory;
		parent::__construct($context, $backendHelper, $data);
	}
	protected function _construct()
	{
		parent::_construct();
		$this->setId('index');
		$this->setDefaultSort('created_at');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection()
	{
		$demo = $this->demoFactory->create()->addFieldToSelect('*');
		$demo->addFieldToFilter('id', array('neq' => ''));
		$this->setCollection($demo);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns()
	{
		$this->addColumn(
			'id',
			[
				'header_css_class' => 'a-center',
				'type' => 'checkbox',
				'name' => 'id',
				'align' => 'center',
				'index' => 'id',
			]
		);
		$this->addColumn(
			'id',
			[
				'header' => __('ID'),
				'type' => 'number',
				'index' => 'id',
				'header_css_class' => 'col-id',
				'column_css_class' => 'col-id',
			]
		);
		$this->addColumn(
			'name',
			[
				'header' => __('Name'),
				'type' => 'text',
				'index' => 'name',
				'header_css_class' => 'col-id',
				'column_css_class' => 'col-id',
			]
		);
		$this->addColumn(
			'email',
			[
				'header' => __('Email'),
				'index' => 'email',
				'class' => '',
				'width' => '125px',
			]
		);
		
		$this->addColumn(
			'action',
			[
				'header' => __('Action'),
				'width'  => '100px',
				'type'   => 'action',
        		'getter' => 'getId',
        		'actions'=> [
          	[
            'caption' => __('Action Name'),
            'url' => ['base' => 'Adnan/Grid/index'],
            'field'  => 'id'  // pass id as parameter
          ]
        ],
        	'filter'=> false,
        	'sortable' => false,
        	'index' => 'id',
        	'is_system' => true
      	]
      );
		return parent::_prepareColumns();
	}
	public function getGridUrl()
	{
		return $this->getUrl('*/*/index', ['_current' => true]);
	}
}