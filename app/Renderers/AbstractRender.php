<?php

namespace App\Renderers;

/**
 * Class AbstractRender
 * @package App\Database\Renderers
 */
abstract class AbstractRender
{
    /**
     * @param $classes
     * @return array
     */
    public function renderList($entities)
    {
        $buffer = [];
        /** @var Class $entity */
        foreach ($entities as $entity) {
            $buffer[] = $this->render($entity);
        }

        return $buffer;
    }
}
