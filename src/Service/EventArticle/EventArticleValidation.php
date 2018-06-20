<?php


namespace App\Service\EventArticle;


use App\Repository\ArticleRepository;
use App\Repository\EventArticleRepository;
use App\Repository\EventRepository;
use App\Repository\UserRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

class EventArticleValidation extends AppValidation
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @var ArticleRepository
     */
    private $articleRepsitory;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EventArticleRepository
     */
    private $eventArticleRepository;

    /**
     * EventArticleValidation constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->eventRepository = $container->get(EventRepository::class);
        $this->articleRepsitory = $container->get(ArticleRepository::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->eventArticleRepository = $container->get(EventArticleRepository::class);
    }

    /**
     * Check if event exists.
     *
     * @param string $departmentId
     * @param string $eventId
     * @return bool
     */
    public function isPossibleForEvent(string $departmentId, string $eventId): bool
    {
        return $this->eventRepository->existsEvent($eventId, $departmentId);
    }

    /**
     * Check if event and article exists.
     *
     * @param string $departmentId
     * @param string $eventId
     * @param string $articleId
     * @param int $quantity
     * @return ValidationContext
     */
    public function isPossible(string $departmentId, string $eventId, string $articleId, int $quantity, string $accountableUserId): ValidationContext
    {
        $validationContext = new ValidationContext();

        if (!$this->eventRepository->existsEvent($eventId, $departmentId)){
            $validationContext->setError('event_id', __('Event does not exist'));
        }

        if (!$this->articleRepsitory->existsArticle($articleId, $departmentId)) {
            $validationContext->setError('field', __('Article does not exist'));
        }

        if ($this->articleRepsitory->hasQuantity($articleId, $quantity)) {
            $validationContext->setError('quantity', __('Not enough available'));
        }

        if (!$this->userRepository->existsUser($accountableUserId)) {
            $validationContext->setError('accountable_user_id', __('User does not exist'));
        }

        return $validationContext;
    }

    /**
     * Check if link exists.
     *
     * @param string $eventId
     * @param string $articleId
     * @return bool
     */
    public function existsLink(string $eventId, string $articleId): bool
    {
        return $this->eventArticleRepository->existsLink($eventId, $articleId);
    }
}
