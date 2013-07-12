<?php


namespace Jbig3Tryings\Entity\Repository;

use Jbig3Base\Entity\Repository\BaseRepository;


/**
 * @author Gregory
 * @version 1.0
 * created 02-Jun-2013 11:57:38
 */
class DoctrineTestRepository extends BaseRepository
{

    public function findAllUsers(){

        $dql = 'SELECT d FROM Jbig3Tryings\Entity\DoctrineTestEntity d';

        $doctrinetest = $this->_em->createQuery($dql)->getResult();
        return $doctrinetest;
    }
}