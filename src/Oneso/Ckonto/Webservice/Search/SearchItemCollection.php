<?php
namespace Oneso\Ckonto\Webservice\Search;

/**
 * @author Marcel Görtz <goertz.marcel@gmail.com>
 * @since 24.02.2015
 */
class SearchItemCollection
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @param array $items
     */
    function __construct(array $items)
    {
        foreach ($items as $key => $data) {
            $this->items[] = new SearchItem($data);
        }
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
} 