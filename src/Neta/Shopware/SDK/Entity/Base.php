<?php

namespace Neta\Shopware\SDK\Entity;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class Base.
 *
 * @author    Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class Base
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var array
     */
    protected $attributesRaw = [];

    /**
     * Sets the attributes of this entity.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setEntityAttributes(array $attributes)
    {
        $this->attributesRaw = $attributes;

        foreach ($attributes as $attribute => $value) {
            $setter = 'set' . ucfirst($attribute);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }

        return $this;
    }

    /**
     * Gets the attributes of this entity.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        $array = get_object_vars($this);

        unset($array['attributesRaw']);

        foreach ($array as $key => &$value) {
            if ($value instanceof Base) {
                $array[$key] = $value->getArrayCopy();
            } elseif (is_array($value)) {
                foreach ($value as $k => $v) {
                    if ($v instanceof Base) {
                        $value[$k] = $v->getArrayCopy();
                    }
                }
            }
        }

        $array = array_filter($array, function ($value) {
            return $value !== null;
        });

        return $array;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Base
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        $method = 'get' . Str::camel(ucfirst($key));

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return Arr::get($this->attributesRaw, $key, null);
    }
}
