<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

namespace MagePal\CustomerAccountLinksManager\Model\Config\Source;

use Magento\Framework\App\Utility\Files;
use Magento\Framework\Option\ArrayInterface;
use Magento\Framework\View\Element\Html\Links;

class Sections implements ArrayInterface
{
    /** @var Files  */
    protected $utilityFiles;

    protected $links;

    protected $list = [];

    public function __construct(
        Files $utilityFiles,
        Links $links
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

    /**
     * @return array
     */
    public function getSections()
    {
        $fileList = $this->utilityFiles->getLayoutFiles(['area_name' => 'frontend'], false);

        foreach ($fileList as $configFile) {
            if (strpos($configFile, 'customer_account.xml') !== false) {
                $configXml = simplexml_load_file($configFile);
                $this->processXmlElement($configXml);
            }
        }

        return $this->list;
    }

    /**
     * @param $configXml
     */
    protected function processXmlElement($configXml)
    {
        if ($referenceBlocks = $configXml->body->referenceBlock) {
            foreach ($referenceBlocks as $referenceBlock) {
                if (!empty($referenceBlock->xpath('block/arguments/argument[@name="label"]'))) {
                    $this->updateReferenceBlockList($referenceBlock);
                }
            }
        }

        if (isset($configXml->body->referenceContainer) && isset($configXml->body->referenceContainer->block)) {
            if (isset($configXml->body->referenceContainer->block->block)
                && isset($configXml->body->referenceContainer->block->block->block)
            ) {
                $referenceContainerBlocks = $configXml->body->referenceContainer->block->block->block;

                for ($count = 0; $count < count($referenceContainerBlocks); $count++) {
                    if (!empty($referenceContainerBlocks[$count]->xpath('arguments/argument[@name="label"]'))) {
                        $this->updateReferenceContainerList($referenceContainerBlocks, $count);
                    }
                }
            } elseif (isset($configXml->body->referenceContainer->block->block)) {
                $referenceContainerBlocks = $configXml->body->referenceContainer->block->block;

                for ($count = 0; $count < count($referenceContainerBlocks); $count++) {
                    if (!empty($referenceContainerBlocks[$count]->xpath('arguments/argument[@name="label"]'))) {
                        $this->updateReferenceContainerList($referenceContainerBlocks, $count);
                    }
                }
            }
        }
    }

    /**
     * @param $rcb
     * @param $count
     */
    protected function updateReferenceContainerList($rcb, $count)
    {
        $this->list[(string) $rcb[$count]['name']] = [
            'value' => (string) $rcb[$count]['name'],
            'label' => (string) $rcb[$count]->xpath('arguments/argument[@name="label"]')[0]
        ];
    }

    /**
     * @param $rb
     */
    protected function updateReferenceBlockList($rb)
    {
        $this->list[(string) $rb->block['name']] = [
            'value' => (string) $rb->block['name'],
            'label' => (string) $rb->xpath('block/arguments/argument[@name="label"]')[0]
        ];
    }
}
