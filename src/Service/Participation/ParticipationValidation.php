<?php


namespace App\Service\Participation;


use App\Repository\EventRepository;
use App\Repository\ParticipationRepository;
use App\Repository\UserRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class ParticipationValidation
 */
class ParticipationValidation extends AppValidation
***REMOVED***
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var ParticipationRepository
     */
    private $participationRepository;

    /**
     * ParticipationValidation constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->eventRepository = $container->get(EventRepository::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->participationRepository = $container->get(ParticipationRepository::class);
***REMOVED***

    /**
     * Validate creation of a participation.
     *
     * @param string $eventId
     * @param string $departmentId
     * @param string $userId
     * @param string $statusId
     * @return ValidationContext
     */
    public function validateAll(string $eventId, string $departmentId, string $userId, string $statusId): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();

        $this->validateEvent($eventId, $departmentId, $validationContext);
        $this->validateUser($userId, $validationContext);
        $this->validateStatus($statusId, $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * Validate get all.
     *
     * @param string $eventId
     * @param string $departmentId
     * @return ValidationContext
     */
    public function validateGetAll(string $eventId, string $departmentId): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();

        $this->validateEvent($eventId, $departmentId, $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * @param string $eventId
     * @param string $departmentId
     * @param string $userId
     * @return ValidationContext
     */
    public function validateEventAndUser(string $eventId, string $departmentId, string $userId): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();

        $this->validateEvent($eventId, $departmentId, $validationContext);
        $this->validateUser($userId, $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * Validate event.
     *
     * @param string $eventId
     * @param string $departmentId
     * @param ValidationContext $validationContext
     */
    private function validateEvent(string $eventId, string $departmentId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->eventRepository->existsEvent($eventId, $departmentId)) ***REMOVED***
            $validationContext->setError('event_id', __('Event does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate user.
     *
     * @param string $userId
     * @param ValidationContext $validationContext
     */
    private function validateUser(string $userId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->userRepository->existsUser($userId)) ***REMOVED***
            $validationContext->setError('user_id', __('User does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate status
     *
     * @param string $statusId
     * @param ValidationContext $validationContext
     */
    private function validateStatus(string $statusId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->participationRepository->existsStatus($statusId)) ***REMOVED***
            $validationContext->setError('status_id', __('Status does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
