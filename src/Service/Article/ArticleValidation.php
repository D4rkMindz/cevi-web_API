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
{
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
    {
        parent::__construct($container);
        $this->articleRepository = $container->get(ArticleRepository::class);
        $this->storageRepository = $container->get(StorageRepository::class);
    }

    /**
     * Validate modify article.
     *
     * @param array $article
     * @return ValidationContext
     */
    public function validateUpdate(array $article): ValidationContext
    {
        $validationContext = new ValidationContext();

        if (!$this->articleRepository->existsArticle($article['hash'], $article['department_hash'])) {
            $validationContext->setError('hash', __('Article does not exist'));
            return $validationContext;
        }

        if (array_key_exists('title', $article)) {
            $this->validateTitle($article['title'], $validationContext);
        }

        if (array_key_exists('description', $article)) {
            $this->validateDescription($article['description'], $validationContext);
        }

        if (array_key_exists('purchase_date', $article)) {
            $this->validatePurchaseDate($article['purchase_date'], $validationContext);
        }

        if (array_key_exists('quantity', $article)) {
            $this->validateQuantity($article['quantity'], $validationContext);
        }

        if (array_key_exists('quality_hash', $article)) {
            $this->validateQuality($article['quality_hash'], $validationContext);
        }

        if (array_key_exists('department_hash', $article)) {
            $this->validateDepartment($article['department_hash'], $validationContext);
        }

        if (array_key_exists('storage_place_hash', $article)) {
            $this->validateStoragePlace($article['storage_place_hash'], $validationContext);
        }

        if (array_key_exists('replacement', $article)) {
            $this->validateReplacement($article['replacement'], $validationContext);
        }

        if (array_key_exists('available_for_rent', $article)) {
            $this->validateAvailableForRent((bool)$article['available_for_rent'], $validationContext);
        }
        if (array_key_exists('rent_price', $article)) {
            $this->validateRentPrice((bool)$article['available_for_rent'], $article['rent_price'], $validationContext);
        }

        return $validationContext;
    }

    /**
     * Validate insert article.
     *
     * @param array $article
     * @return ValidationContext
     */
    public function validateCreateArticle(array $article): ValidationContext
    {
        $validationContext = new ValidationContext();

        $this->validateTitle((string)array_value('title', $article), $validationContext);
        $this->validateDescription((string)array_value('description', $article), $validationContext);
        $this->validatePurchaseDate((int)array_value('purchase_date', $article), $validationContext);
        $this->validateQuantity((int)array_value('quantity', $article), $validationContext);
        $this->validateQuality((string)array_value('quality_hash', $article), $validationContext);
        $this->validateStoragePlace((string)array_value('storage_place_hash', $article), $validationContext);
        $this->validateReplacement((string)array_value('replacement', $article), $validationContext);
        $this->validateAvailableForRent((bool)array_value('available_for_rent', $article), $validationContext);
        if (array_key_exists('rent_price', $article)) {
            $this->validateRentPrice((bool)$article['available_for_rent'], $article['rent_price'], $validationContext);
        }

        return $validationContext;
    }

    /**
     * Validate title.
     *
     * @param string $title
     * @param ValidationContext $validationContext
     */
    private function validateTitle(string $title, ValidationContext $validationContext)
    {
        $this->validateLength($title, 'title', $validationContext, 3, 60);
    }

    /**
     * Validate description.
     *
     * @param string $description
     * @param ValidationContext $validationContext
     */
    private function validateDescription(string $description, ValidationContext $validationContext)
    {
        $this->validateLength($description, 'description', $validationContext, 10, 10000);
    }

    /**
     * Validate purchase date.
     *
     * @param int $purchaseTime
     * @param ValidationContext $validationContext
     */
    private function validatePurchaseDate($purchaseTime, ValidationContext $validationContext)
    {
        $this->validateNotEmpty($purchaseTime, 'purchase_date', $validationContext);

        $this->validateDate($purchaseTime, 'purchase_date', $validationContext, true);

        if ($purchaseTime >= time() + 60 * 60 * 24 * 365) {
            $validationContext->setError('purchase_date', __('Dates more than a year in the future are not allowed here'));
        }
    }

    /**
     * Validate quantity.
     *
     * @param int $quantity
     * @param ValidationContext $validationContext
     */
    private function validateQuantity(int $quantity, ValidationContext $validationContext)
    {
        $this->validateNotEmpty($quantity, 'quantity', $validationContext);

        if ($quantity > 10000 || $quantity <= 0) {
            $validationContext->setError('quantity', __('Impossible quantity'));
        }
    }

    /**
     * Validate quality.
     *
     * @param int $qualityHash
     * @param ValidationContext $validationContext
     */
    private function validateQuality(string $qualityHash, ValidationContext $validationContext)
    {
        $fails = $this->validateNotEmpty($qualityHash, 'quality_hash', $validationContext);

        if ($fails) {
            return;
        }

        if (!$this->articleRepository->existsQuality((string)$qualityHash)) {
            $validationContext->setError('quality_hash', __('Quality does not exist'));
        }
    }

    /**
     * Validate if department exists.
     *
     * @param int $departmentHash
     * @param ValidationContext $validationContext
     */
    private function validateDepartment(string $departmentHash, ValidationContext $validationContext)
    {
        $this->validateNotEmpty($departmentHash, 'department_hash', $validationContext);

        if (!$this->departmentRepository->existsDepartment($departmentHash)) {
            $validationContext->setError('department_hash', __('Department does not exist'));
        }
    }

    /**
     * Validate replacement.
     *
     * @param string $replacemnentDate
     * @param ValidationContext $validationContext
     */
    private function validateReplacement(string $replacemnentDate, ValidationContext $validationContext)
    {
        $this->validateDate($replacemnentDate, 'replacement', $validationContext, true);
    }

    /**
     * Validate storage place id.
     *
     * @param string $storagePlaceHash
     * @param ValidationContext $validationContext
     */
    private function validateStoragePlace(string $storagePlaceHash, ValidationContext $validationContext)
    {
        if (!$this->articleRepository->existsStoragePlace($storagePlaceHash)) {
            $validationContext->setError('storage_place_hash', __('Storage place does not exist'));
        }
    }

    /**
     * Validate available for rent.
     * pretty useless atm...
     *
     * @param bool $availableForRent
     * @param ValidationContext $validationContext
     */
    private function validateAvailableForRent(bool $availableForRent, ValidationContext $validationContext)
    {
        if (!is_bool($availableForRent)) {
            $validationContext->setError('available_for_rent', __('Please define it correctly'));
        }
    }

    /**
     * Validate the rent price
     *
     * @param bool $availableForRent
     * @param $price
     * @param ValidationContext $validationContext
     */
    private function validateRentPrice(bool $availableForRent, $price, ValidationContext $validationContext)
    {
        if ($price > 0 && !$availableForRent) {
            $validationContext->setError('rent_price', __('The article must be available to rent to define a rent price.'));
        }
        if ($price < 0) {
            $validationContext->setError('rent_price', __('The rent price can not be less than zero'));
        }
    }
}
