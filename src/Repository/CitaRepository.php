<?php

namespace App\Repository;

use App\Entity\Cita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cita|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cita|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cita[]    findAll()
 * @method Cita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CitaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cita::class);
    }

    public function encontrarChoques($paciente,$fecha,$especialidad)
    {


        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT m,rol FROM App\Entity\AppMenu m " .
            'LEFT OUTER JOIN m.appRole rol ' .
            'WHERE m.statusItem=1 AND m.slug=:slug AND m.appEnv=:env AND rol.name IN (:r)'
        )->setParameters(['env' => $env, 'slug' => $this->module, 'r' => $roles]);

        return $query->getResult();
    }


    // /**
    //  * @return Cita[] Returns an array of Cita objects
    //  */    
    public function sumaCitas($fecha)
    {
        $fecha = $fecha->format('Y-m-d');
        $dql = 'SELECT COALESCE(COUNT(c),0) AS SUMA, e.nombre AS ESPECIALIDAD '
            . "FROM App\Entity\Cita c "
            . 'LEFT OUTER JOIN c.Especialidad e '
            . "WHERE c.fecha='$fecha'"
            . "GROUP BY e.nombre";           
        $repositorio = $this->getEntityManager()->createQuery($dql);

        return $repositorio->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Cita
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
