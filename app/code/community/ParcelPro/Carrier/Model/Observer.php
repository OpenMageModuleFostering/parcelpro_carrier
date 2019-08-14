<?php
class ParcelPro_Carrier_Model_Observer
{
	public function handle_adminSystemConfigChangedSection()
	{
		//die('I have called the admin config changed observer');
		$model = Mage::getModel('carrier/config');
		$collection = $model->getCollection()
			->addFieldToFilter('config_type',array('eq'=>'session_id'));
		if($collection->getSize()){
			$item = $collection->getFirstItem();
			$item->delete();
		}
	}
}