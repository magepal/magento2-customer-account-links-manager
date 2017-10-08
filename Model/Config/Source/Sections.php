<?php
/**
 * Copyright © 2017 MagePal. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagePal\CustomerAccountLinksManager\Model\Config\Source;

class Sections implements \Magento\Framework\Option\ArrayInterface
{
    /** @var \Magento\Framework\App\Utility\Files  */
    protected $utilityFiles;

    protected $links;

    public function __construct(
        \Magento\Framework\App\Utility\Files $utilityFiles,
        \Magento\Framework\View\Element\Html\Links $links
    ) {
        $this->utilityFiles = $utilityFiles;
        $this->links = $links;
    }
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getSections();

    }


    public function getSections()
    {
        $fileList = $this->utilityFiles->getLayoutFiles(['area_name' => 'frontend'], false);

        $list = [];

        foreach ($fileList as $configFile) {
            if(strpos($configFile, 'customer_account.xml') !== false){
                $configXml = simplexml_load_file($configFile);

                if($referenceBlocks = $configXml->body->referenceBlock){
                    foreach($referenceBlocks as $referenceBlock){
                        if(!empty($referenceBlock->xpath('block/arguments/argument[@name="label"]'))){
                            $list[(string) $referenceBlock->block['name']] = [
                                'value' => (string) $referenceBlock->block['name'],
                                'label' => (string) $referenceBlock->xpath('block/arguments/argument[@name="label"]')[0]
                            ];
                        }

                    }

                }
                else if($referenceContainerBlocks = $configXml->body->referenceContainer->block->block->block){
                    for($count = 0; $count < count($referenceContainerBlocks); $count++){
                        if(!empty($referenceContainerBlocks[$count]->xpath('arguments/argument[@name="label"]'))){
                            $list[(string) $referenceContainerBlocks[$count]['name']] = [
                                'value' => (string) $referenceContainerBlocks[$count]['name'],
                                'label' => (string) $referenceContainerBlocks[$count]->xpath('arguments/argument[@name="label"]')[0]
                            ];
                        }
                    }
                }
                else if($referenceContainerBlocks = $configXml->body->referenceContainer->block->block){
                    for($count = 0; $count < count($referenceContainerBlocks); $count++){
                        if(!empty($referenceContainerBlocks[$count]->xpath('arguments/argument[@name="label"]'))){
                            $list[(string) $referenceContainerBlocks[$count]['name']] = [
                                'value' => (string) $referenceContainerBlocks[$count]['name'],
                                'label' => (string) $referenceContainerBlocks[$count]->xpath('arguments/argument[@name="label"]')[0]
                            ];
                        }

                    }
                }


            }

        }

        return $list;
    }
}
