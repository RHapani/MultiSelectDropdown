<?php
/**
 * Created By : Rohan Hapani
 */
namespace RH\MultiSelectCategory\Block\Adminhtml;

class MultiUiSelect extends \Magento\Config\Block\System\Config\Form\Field
{

    /**
     * Retrieve Element HTML fragment
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $script = " <script>
                require([
                    'jquery',
                    'chosen'
                ], function ($, chosen) {
                    $('#" . $element->getId() . "').chosen({
                        width: '100%',
                        placeholder_text: '" . __('Select Options') . "'
                    });
                    $('#" . $element->getId() . "_inherit').change(function() {

                        $('#" . $element->getId() . "').prop('disabled', $(this).is(':checked'));
  						$('#" . $element->getId() . "').trigger('chosen:updated');
                    });
                })
            </script>";
        return parent::_getElementHtml($element) . $script;
    }
}
