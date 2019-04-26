<?php

namespace Neta\Shopware\SDK\Query;

use Neta\Shopware\SDK\Util\Constants;

/**
 * Class VariantsQuery.
 *
 * @author    Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class VariantsQuery extends Base
{
    /**
     * @var array
     */
    protected $methodsAllowed = [
        Constants::METHOD_CREATE,
        Constants::METHOD_GET,
        Constants::METHOD_UPDATE,
        Constants::METHOD_UPDATE_BATCH,
        Constants::METHOD_DELETE,
        Constants::METHOD_DELETE_BATCH,
    ];

    /**
     * @return mixed
     */
    protected function getClass()
    {
        return \Neta\Shopware\SDK\Entity\ArticleDetail::class;
    }

    /**
     * @return string
     */
    protected function getQueryPath()
    {
        return 'variants';
    }
}
