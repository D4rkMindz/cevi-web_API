<?php


namespace App\Service\Article;


use App\Repository\ArticleRepository;
use App\Repository\StorageRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

/**
 * Class ArticleValidation
 */
class ArticleValidation extends AppValidation
***REMOVED***
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var StorageRepository
     */
    private $storageRepository;

    /**
     * ArticleValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->articleRepository = $container->get(ArticleRepository::class);
        $this->storageRepository = $container->get(StorageRepository::class);
***REMOVED***

    /**
     * Validate create article.
     *
     * @param array $article
     * @return ValidationContext
     */
    public function validateCreateArticle(array $article): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();

        $this->validateTitle((string)$article['title'], $validationContext);
        $this->validateDescription((string)$article['description'], $validationContext);
        $this->validatePurchaseDate((int)$article['purchase_date'], $validationContext);
        $this->validateQuantity((int)$article['quantity'], $validationContext);
        $this->validateQuality((int)$article['quality'], $validationContext);

        $this->validateDepartment((int)$article['department_id'], $validationContext);
        $this->validateStorage((int)$article['location_id'], (int)$article['room_id'], (int)$article['corridor_id'], (int)$article['shelf_id'], (int)$article['tray_id'], (int)$article['chest_id'], $validationContext);
        $this->validateReplacement((int)$article['replacement_date'], $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * Validate title.
     *
     * @param string $title
     * @param ValidationContext $validationContext
     */
    private function validateTitle(string $title, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($title, 'title', $validationContext);
***REMOVED***

    /**
     * Validate description.
     *
     * @param string $description
     * @param ValidationContext $validationContext
     */
    private function validateDescription(string $description, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($description, 'description', $validationContext, 10, 10000);
***REMOVED***

    /**
     * Validate purchase date.
     *
     * @param int $purchaseTime
     * @param ValidationContext $validationContext
     */
    private function validatePurchaseDate(int $purchaseTime, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateNotEmpty($purchaseTime, 'purchase_time', $validationContext);

        $this->validateDate($purchaseTime, 'purchase_date', $validationContext, true);

        if ($purchaseTime >= time() + 60 * 60 * 24 * 365) ***REMOVED***
            $validationContext->setError('purchase_date', __('Dates more than a year in the future are not allowed here'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate quantity.
     *
     * @param int $quantity
     * @param ValidationContext $validationContext
     */
    private function validateQuantity(int $quantity, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateNotEmpty($quantity, 'quantity', $validationContext);

        if ($quantity > 10000 || $quantity <= 0) ***REMOVED***
            $validationContext->setError('quantity', __('Impossible quantity'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate quality.
     *
     * @param int $qualityId
     * @param ValidationContext $validationContext
     */
    private function validateQuality(int $qualityId, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateNotEmpty($qualityId, 'quality_id', $validationContext);

        if (!$this->articleRepository->existsQuality((string)$qualityId)) ***REMOVED***
            $validationContext->setError('quality', __('Quality id does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate if department exists.
     *
     * @param int $departmentId
     * @param ValidationContext $validationContext
     */
    private function validateDepartment(int $departmentId, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateNotEmpty($departmentId, 'department_id', $validationContext);

        if (!$this->departmentRepository->existsDepartment($departmentId)) ***REMOVED***
            $validationContext->setError('department_id', __('Department does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate storage.
     *
     * @param string $locationId
     * @param string $roomId
     * @param string $corridorId
     * @param string $shelfId
     * @param string $trayId
     * @param string $chestId
     * @param ValidationContext $validationContext
     */
    public function validateStorage(string $locationId, string $roomId, string $corridorId, string $shelfId, string $trayId, string $chestId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->storageRepository->existsLocation($locationId)) ***REMOVED***
            $validationContext->setError('location_id', __('Location id does not exist'));
    ***REMOVED***

        if (!empty($roomId) && !$this->storageRepository->existsRoom($roomId)) ***REMOVED***
            $validationContext->setError('room_id', __('Room id does not exist'));
    ***REMOVED***

        if (!empty($corridorId) && !$this->storageRepository->existsCorridor($corridorId)) ***REMOVED***
            $validationContext->setError('corridor_id', __('Corridor id does not exist'));
    ***REMOVED***

        if (!empty($shelfId) && !$this->storageRepository->existsShelf($shelfId)) ***REMOVED***
            $validationContext->setError('shelf_id', __('Shelf id does not exist'));
    ***REMOVED***

        if (!empty($trayId) && !$this->storageRepository->existsTray($trayId)) ***REMOVED***
            $validationContext->setError('tray_id', __('Tray id does not exist'));
    ***REMOVED***

        if (!empty($chestId) && !$this->storageRepository->existsChest($chestId)) ***REMOVED***
            $validationContext->setError('chest_id', __('Chest id does not exist'));
    ***REMOVED***

        // TODO check if maybe useless to check if storage exists.
        if (!$this->storageRepository->existsStorage($locationId, $roomId, $corridorId, $shelfId, $trayId, $chestId)) ***REMOVED***
            $validationContext->setError('storage', __('Storage does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate replacement.
     *
     * @param string $replacemnentDate
     * @param ValidationContext $validationContext
     */
    private function validateReplacement(string $replacemnentDate, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateNotEmpty($replacemnentDate, 'replacement_date', $validationContext);
        $this->validateDate($replacemnentDate, 'replacement_date', $validationContext, true);
***REMOVED***
***REMOVED***
