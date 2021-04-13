<?php

namespace Adnan\Grid\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_itemFactory;

	public function __construct(\Adnan\Grid\Model\ItemFactory $itemFactory)
	{
		$this->_itemFactory = $itemFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$data = [
			'name'          => "Adnan Haider",
			'email'         => "adnanhaider530@gmail.com",
			'telephone'     => '03212405512',
			'description'   => 'Serior Magento Developer',
		];
		$post = $this->_itemFactory->create();
		$post->addData($data)->save();
	}
}