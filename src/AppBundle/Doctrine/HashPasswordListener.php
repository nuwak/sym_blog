<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 05.10.17
 * Time: 17:52
 */

namespace AppBundle\Doctrine;


use Doctrine\Common\EventSubscriber;

class HashPasswordListener implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return ['prePersist', 'preUpdate'];
    }

}