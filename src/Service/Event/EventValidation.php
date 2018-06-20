<?php

namespace App\Service\Event;

use App\Service\AppValidation;
use App\Util\ValidationContext;

class EventValidation extends AppValidation
{
    /**
     * Validate insert event action data.
     *
     * The data array MUST include:
     *
     * title
     * description
     * start int
     * end
     * start_leaders
     * end_leaders
     * price
     * public
     * publicize_at
     *
     * @param array $data
     * @return ValidationContext
     */
    public function validateCreate(array $data): ValidationContext
    {
        $validationContext = new ValidationContext();

        $this->validateTitle((string)$data['title'], $validationContext);
        $this->validateDescription((string)$data['description'], $validationContext);
        $fail = $this->validateStart((int)$data['start'], $validationContext);
        if (!$fail) {
            $fail = $this->validateEnd((int)$data['start'], (int)$data['end'], $validationContext);
        }
        if (!$fail) {
            $fail = $this->validateStartLeaders((int)$data['start_leaders'], (int)$data['start'], $validationContext);
        }
        if (!$fail) {
            $this->validateEndLeaders((int)$data['end_leaders'], (int)$data['end'], $validationContext);
        }

        $this->validatePrice((float)$data['price'], $validationContext);
        $this->validatePublication((bool)$data['public'], (int)$data['publicize_at'], (int)$data['start'], $validationContext);

        return $validationContext;
    }

    /**
     * Validate insert event action data.
     *
     * The data array MUST include:
     *
     * title
     * description
     * start int
     * end
     * start_leaders
     * end_leaders
     * price
     * public
     * publicize_at
     *
     * @param array $data
     * @return ValidationContext
     */
    public function validateUpdate(array $data): ValidationContext
    {
        $validationContext = new ValidationContext();
        $fail = false;

        if (array_key_exists('title', $data)) {
            $this->validateTitle((string)$data['title'], $validationContext);
        }
        if (array_key_exists('description', $data)) {
            $this->validateDescription((string)$data['description'], $validationContext);
        }
        if (array_key_exists('start', $data)) {
            $fail = $this->validateStart((int)$data['start'], $validationContext);
        }
        if (array_key_exists('end', $data) && !$fail) {
            $fail = $this->validateEnd((int)$data['start'], (int)$data['end'], $validationContext);
        }
        if (array_key_exists('start_leaders', $data) && !$fail) {
            $fail = $this->validateStartLeaders((int)$data['start_leaders'], (int)$data['start'], $validationContext);
        }
        if (array_key_exists('end_leaders', $data) && !$fail) {
            $this->validateEndLeaders((int)$data['end_leaders'], (int)$data['end'], $validationContext);
        }
        if (array_key_exists('price', $data)) {
            $this->validatePrice((float)$data['price'], $validationContext);
        }
        if (array_key_exists('public', $data)) {
            $this->validatePublication((bool)$data['public'], (int)$data['publicize_at'], (int)$data['start'], $validationContext);
        }

        return $validationContext;
    }

    /**
     * Validate event title.
     *
     * @param string $title
     * @param ValidationContext $validationContext
     */
    private function validateTitle(string $title, ValidationContext $validationContext)
    {
        $this->validateLength($title, 'title', $validationContext);
    }

    /**
     * Validate event description
     *
     * @param string $description
     * @param ValidationContext $validationContext
     */
    private function validateDescription(string $description, ValidationContext $validationContext)
    {
        $this->validateLength($description, 'description', $validationContext, 10, 10000);
    }

    /**
     * Validate event start date
     *
     * @param int $start
     * @param ValidationContext $validationContext
     * @return bool
     */
    private function validateStart(int $start, ValidationContext $validationContext): bool
    {
        $fail = false;
        if ($start < time()) {
            $validationContext->setError('start', __('The start of the event can not be in the past'));
            $fail = true;
        }

        if ($start > (time() + (60 * 60 * 24 * 365 * 3))) {
            $validationContext->setError('start', __('The start of the event must be within 3 years'));
            $fail = true;
        }

        return $fail;
    }

    /**
     * Validate end of the event.
     * Prevalidation of start REQUIRED
     *
     * @param int $start
     * @param int $end
     * @param ValidationContext $validationContext
     * @return bool
     */
    private function validateEnd(int $start, int $end, ValidationContext $validationContext): bool
    {
        $fail = false;
        if ($start >= $end) {
            $validationContext->setError('end', __('The end of the event must be after the start'));
            $fail = true;
        }

        if ($end >= ($start + (60 * 60 * 24 * 28))) {
            $validationContext->setError('end', __('If your event really lasts longer than 4 weeeks, please contact the administrator'));
            $fail = true;
        }

        return $fail;
    }

    /**
     * Validate start leaders time.
     * Prevalidation of start REQUIRED
     *
     * @param int $startLeaders
     * @param int $start
     * @param ValidationContext $validationContext
     * @return bool
     */
    private function validateStartLeaders(int $startLeaders, int $start, ValidationContext $validationContext): bool
    {
        $fail = false;
        if ($startLeaders < ($start - (60 * 60 * 24 * 14))) {
            $validationContext->setError('start_leaders', __('If your leader meeting time really starts two weeks before the event, please contact the administrator'));
            $fail = true;
        }

        if ($startLeaders >= $start) {
            $validationContext->setError('start_leaders', __('The leader meeting time must be before the real event'));
            $fail = true;
        }

        return $fail;
    }

    /**
     * Validate end leaders time.
     * Prevaliation of end REQUIRED
     *
     * @param int $endLeaders
     * @param int $end
     * @param ValidationContext $validationContext
     * @return bool
     */
    private function validateEndLeaders(int $endLeaders, int $end, ValidationContext $validationContext): bool
    {
        $fail = false;
        if ($endLeaders <= $end) {
            $validationContext->setError('end_leaders', __('The event end time for the leaders must be after the real event'));
            $fail = true;
        }

        if ($endLeaders >= ($end + (60 * 60 * 24 * 14))) {
            $validationContext->setError('end_leaders', __('If the event end time for your leaders is really later than two weeks, please contact the administrator'));
            $fail = true;
        }

        return $fail;
    }

    /**
     * Validate the price of the event.
     *
     * @param float $price
     * @param ValidationContext $validationContext
     */
    private function validatePrice(float $price, ValidationContext $validationContext)
    {
        if ($price < 0) {
            $validationContext->setError('price', __('Price can not be negative'));
        }

        if ($price >= 1000) {
            $validationContext->setError('price', __('If the price is really this high, please contact the administrator'));
        }
    }

    /**
     * Validate publication data of the event.
     *
     * @param bool $isPublic
     * @param int $publicizeAt
     * @param int $start
     * @param ValidationContext $validationContext
     */
    private function validatePublication(bool $isPublic, int $publicizeAt, int $start, ValidationContext $validationContext)
    {
        if (!$isPublic) {
            return;
        }

        // TODO maybe remove offset of 8 hrs? YAGNI...
        if ($publicizeAt < time() - (60 * 60 * 8)) {
            $validationContext->setError('publicize_at', __('The earliest publication time is now'));
        }

        // TODO maybe add a offset of a few days?
        if ($publicizeAt > $start) {
            $validationContext->setError('publicize_at', __('The event must be publicized before the start of the event'));
        }
    }
}
