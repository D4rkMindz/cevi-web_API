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
     * Validate modify article.
     *
     * @param array $article
     * @return ValidationContext
     */
    public function validateUpdate(array $article): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();

        if (!$this->articleRepository->existsArticle($article['article_hash'], $article['department_hash'])) ***REMOVED***
            $validationContext->setError('article_hash', __('Article does not exist'));
            return $validationContext;
    ***REMOVED***

        if (array_key_exists('title', $article)) ***REMOVED***
            $this->validateTitle($article['title'], $validationContext);
    ***REMOVED***

        if (array_key_exists('description', $article)) ***REMOVED***
            $this->validateDescription($article['description'], $validationContext);
    ***REMOVED***

        if (array_key_exists('purchase_date', $article)) ***REMOVED***
            $this->validatePurchaseDate($article['purchase_date'], $validationContext);
    ***REMOVED***

        if (array_key_exists('quantity', $article)) ***REMOVED***
            $this->validateQuantity($article['quantity'], $validationContext);
    ***REMOVED***

        if (array_key_exists('quality', $article)) ***REMOVED***
            $this->validateQuality($article['quality'], $validationContext);
    ***REMOVED***

        if (array_key_exists('department_id', $article)) ***REMOVED***
            $this->validateDepartment($article['department'], $validationContext);
    ***REMOVED***

        $storagePlaceId = array_key_exists('storage_place_id', $article);
        $locationId = array_key_exists('location_id', $article);
        $roomId = array_key_exists('room_id', $article);
        $corridorId = array_key_exists('corridor_id', $article);
        $shelfId = array_key_exists('shelf_id', $article);
        $trayId = array_key_exists('tray_id', $article);
        $chestId = array_key_exists('chest_id', $article);

        // Check if either the storage place exists or the location matrix, but prioritize storage place id
        if ($storagePlaceId) ***REMOVED***
            $this->validateStoragePlace($article['storage_place_id'], $validationContext);
    ***REMOVED*** else if ($locationId || $roomId || $corridorId || $shelfId || $trayId || $chestId) ***REMOVED***
            $this->validateStorage((int)$article['location_id'], (int)$article['room_id'], (int)$article['corridor_id'], (int)$article['shelf_id'], (int)$article['tray_id'], (int)$article['chest_id'], $validationContext);
    ***REMOVED***

        if (array_key_exists('replacement_date', $article)) ***REMOVED***
            $this->validateReplacement($article['replacement_date'], $validationContext);
    ***REMOVED***

        return $validationContext;
***REMOVED***

    /**
     * Validate insert article.
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

        if (!empty($article['storage_place_id'])) ***REMOVED***
            $this->validateStoragePlace($article['storage_place_id'], $validationContext);
    ***REMOVED*** else ***REMOVED***
            $this->validateStorage((int)$article['location_id'], (int)$article['room_id'], (int)$article['corridor_id'], (int)$article['shelf_id'], (int)$article['tray_id'], (int)$article['chest_id'], $validationContext);
    ***REMOVED***

        $this->validateReplacement((int)$article['replacement_date'], $validationContext);

        return $validationContext;
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
            $validationContext->setError('storage', __('Storage place does not exist'));
    ***REMOVED***
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
        $this->validateNotEmpty($qualityId, 'quality', $validationContext);

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
     * Validate replacement.
     *
     * @param string $replacemnentDate
     * @param ValidationContext $validationContext
     */
    private function validateReplacement(string $replacemnentDate, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateDate($replacemnentDate, 'replacement_date', $validationContext, true);
***REMOVED***

    /**
     * Validate storage place id.
     *
     * @param string $storagePlaceId
     * @param ValidationContext $validationContext
     */
    private function validateStoragePlace(string $storagePlaceId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->articleRepository->existsStoragePlace($storagePlaceId)) ***REMOVED***
            $validationContext->setError('storage_place_id', __('Storage place does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
