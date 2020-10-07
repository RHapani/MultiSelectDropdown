<?php
/**
 * Created By : Rohan Hapani
 */
namespace RH\MultiSelectCategory\Model\Source;

use Magento\Framework\Option\ArrayInterface;

class Attribute implements ArrayInterface
{

    protected $collectionFactory;

    /**
     * @param EavConfig $eavConfig
     */
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function toOptionArray()
    {
        $optionArray = [];
        $arr = $this->collectionFactory->create()->addAttributeToSelect('*');
        foreach ($arr as $value => $label) {
                $optionArray[] = [
                    'value' => $label->getId(),
                    'label' => $label->getName(),
                ];
        }
        return $optionArray;
    }
}
