<?php
namespace Kreativrudel\Sucuri\EventListener;

use TYPO3\CMS\Backend\Backend\Event\ModifyClearCacheActionsEvent;

final class Cache {

    public function __invoke(ModifyClearCacheActionsEvent $event): void
    {
        // do magic here
        $event;
        $foo = "bar";

        $event->addCacheAction([
            'id' => 'sucuri',
            'title' => 'LLL:EXT:sucuri/Resources/Private/Language/locallang_be.xlf:cache_title',
            'description' => 'LLL:EXT:sucuri/Resources/Private/Language/locallang_be.xlf:cache_description',
            'href' => '/foo/sucuri',
            'iconIdentifier' => 'actions-barcode',
        ]);
        $event->addCacheActionIdentifier('sucuri');
    }

}
