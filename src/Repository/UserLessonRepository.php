<?php

namespace App\Repository;

use App\Entity\UserLesson;
use App\Model\LessonInterface;
use App\Model\UserLessonInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method UserLesson|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserLesson|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserLesson[]    findAll()
 * @method UserLesson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserLessonRepository extends ServiceEntityRepository implements UserLessonRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserLesson::class);
    }

    public function getOneByUserAndLesson(UserInterface $user, LessonInterface $lesson): ?UserLessonInterface
    {
        return $this->createQueryBuilder('ul')
            ->where('ul.lesson = :lesson')
            ->andWhere('ul.user = :user')
            ->setParameters(['user' => $user, 'lesson' => $lesson])
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
