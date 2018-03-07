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
***REMOVED***
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
    ***REMOVED***
        parent::__construct($container);
        $this->eventRepository = $container->get(EventRepository::class);
        $this->articleRepsitory = $container->get(ArticleRepository::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->eventArticleRepository = $container->get(EventArticleRepository::class);
***REMOVED***

    /**
     * Check if event exists.
     *
     * @param string $departmentId
     * @param string $eventId
     * @return bool
     */
    public function isPossibleForEvent(string $departmentId, string $eventId): bool
    ***REMOVED***
        return $this->eventRepository->existsEvent($eventId, $departmentId);
***REMOVED***

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
    ***REMOVED***
        $validationContext = new ValidationContext();

        if (!$this->eventRepository->existsEvent($eventId, $departmentId))***REMOVED***
            $validationContext->setError('event_id', __('Event does not exist'));
    ***REMOVED***

        if (!$this->articleRepsitory->existsArticle($articleId, $departmentId)) ***REMOVED***
            $validationContext->setError('field', __('Article does not exist'));
    ***REMOVED***

        if ($this->articleRepsitory->hasQuantity($articleId, $quantity)) ***REMOVED***
            $validationContext->setError('quantity', __('Not enough available'));
    ***REMOVED***

        if (!$this->userRepository->existsUser($accountableUserId)) ***REMOVED***
            $validationContext->setError('accountable_user_id', __('User does not exist'));
    ***REMOVED***

        return $validationContext;
***REMOVED***

    /**
     * Check if link exists.
     *
     * @param string $eventId
     * @param string $articleId
     * @return bool
     */
    public function existsLink(string $eventId, string $articleId): bool
    ***REMOVED***
        return $this->eventArticleRepository->existsLink($eventId, $articleId);
***REMOVED***
***REMOVED***
