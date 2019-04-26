<?php

namespace Neta\Shopware\SDK\Query;

use Neta\Shopware\SDK\Util\Constants;

/**
 * Class VersionQuery
 *
 * @author    Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class VersionQuery extends Base
{
    /**
     * @var array
     */
    protected $methodsAllowed = [
        Constants::METHOD_GET_BATCH,
    ];

    /**
     * @return false|\stdClass
     */
    public function getVersion()
    {
        return $this->fetchJson('/version');
    }

    /**
     * @return mixed
     */
    protected function getClass()
    {
        return 'stdClass';
    }

    /**
     * @return string
     */
    protected function getQueryPath()
    {
        return 'version';
    }
}
