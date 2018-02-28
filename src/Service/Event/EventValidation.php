<?php

namespace App\Service\Event;

use App\Service\AppValidation;
use App\Util\ValidationContext;

class EventValidation extends AppValidation
***REMOVED***
    /**
     * Validate create event action data.
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
    ***REMOVED***
        $validationContext = new ValidationContext();

        $this->validateTitle((string)$data['title'], $validationContext);
        $this->validateDescription((string)$data['description'], $validationContext);
        $fail = $this->validateStart((int)$data['start'], $validationContext);
        if (!$fail) ***REMOVED***
            $fail = $this->validateEnd((int)$data['start'], (int)$data['end'], $validationContext);
    ***REMOVED***
        if (!$fail) ***REMOVED***
            $fail = $this->validateStartLeaders((int)$data['start_leaders'], (int)$data['start'], $validationContext);
    ***REMOVED***
        if (!$fail) ***REMOVED***
            $this->validateEndLeaders((int)$data['end_leaders'], (int)$data['end'], $validationContext);
    ***REMOVED***

        $this->validatePrice((float)$data['price'], $validationContext);
        $this->validatePublication((bool)$data['public'], (int)$data['publicize_at'], (int)$data['start'], $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * Validate create event action data.
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
    ***REMOVED***
        $validationContext = new ValidationContext();
        $fail = false;

        if (array_key_exists('title', $data)) ***REMOVED***
            $this->validateTitle((string)$data['title'], $validationContext);
    ***REMOVED***
        if (array_key_exists('description', $data)) ***REMOVED***
            $this->validateDescription((string)$data['description'], $validationContext);
    ***REMOVED***
        if (array_key_exists('start', $data)) ***REMOVED***
            $fail = $this->validateStart((int)$data['start'], $validationContext);
    ***REMOVED***
        if (array_key_exists('end', $data) && !$fail) ***REMOVED***
            $fail = $this->validateEnd((int)$data['start'], (int)$data['end'], $validationContext);
    ***REMOVED***
        if (array_key_exists('start_leaders', $data) && !$fail) ***REMOVED***
            $fail = $this->validateStartLeaders((int)$data['start_leaders'], (int)$data['start'], $validationContext);
    ***REMOVED***
        if (array_key_exists('end_leaders', $data) && !$fail) ***REMOVED***
            $this->validateEndLeaders((int)$data['end_leaders'], (int)$data['end'], $validationContext);
    ***REMOVED***
        if (array_key_exists('price', $data)) ***REMOVED***
            $this->validatePrice((float)$data['price'], $validationContext);
    ***REMOVED***
        if (array_key_exists('public', $data)) ***REMOVED***
            $this->validatePublication((bool)$data['public'], (int)$data['publicize_at'], (int)$data['start'], $validationContext);
    ***REMOVED***

        return $validationContext;
***REMOVED***

    /**
     * Validate event title.
     *
     * @param string $title
     * @param ValidationContext $validationContext
     */
    private function validateTitle(string $title, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($title, 'title', $validationContext);
***REMOVED***

    /**
     * Validate event description
     *
     * @param string $description
     * @param ValidationContext $validationContext
     */
    private function validateDescription(string $description, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($description, 'description', $validationContext, 10, 10000);
***REMOVED***

    /**
     * Validate event start date
     *
     * @param int $start
     * @param ValidationContext $validationContext
     * @return bool
     */
    private function validateStart(int $start, ValidationContext $validationContext): bool
    ***REMOVED***
        $fail = false;
        if ($start < time()) ***REMOVED***
            $validationContext->setError('start', __('The start of the event can not be in the past'));
            $fail = true;
    ***REMOVED***

        if ($start > (time() + (60 * 60 * 24 * 365 * 3))) ***REMOVED***
            $validationContext->setError('start', __('The start of the event must be within 3 years'));
            $fail = true;
    ***REMOVED***

        return $fail;
***REMOVED***

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
    ***REMOVED***
        $fail = false;
        if ($start >= $end) ***REMOVED***
            $validationContext->setError('end', __('The end of the event must be after the start'));
            $fail = true;
    ***REMOVED***

        if ($end >= ($start + (60 * 60 * 24 * 28))) ***REMOVED***
            $validationContext->setError('end', __('If your event really lasts longer than 4 weeeks, please contact the administrator'));
            $fail = true;
    ***REMOVED***

        return $fail;
***REMOVED***

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
    ***REMOVED***
        $fail = false;
        if ($startLeaders < ($start - (60 * 60 * 24 * 14))) ***REMOVED***
            $validationContext->setError('start_leaders', __('If your leader meeting time really starts two weeks before the event, please contact the administrator'));
            $fail = true;
    ***REMOVED***

        if ($startLeaders >= $start) ***REMOVED***
            $validationContext->setError('start_leaders', __('The leader meeting time must be before the real event'));
            $fail = true;
    ***REMOVED***

        return $fail;
***REMOVED***

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
    ***REMOVED***
        $fail = false;
        if ($endLeaders <= $end) ***REMOVED***
            $validationContext->setError('end_leaders', __('The event end time for the leaders must be after the real event'));
            $fail = true;
    ***REMOVED***

        if ($endLeaders >= ($end + (60 * 60 * 24 * 14))) ***REMOVED***
            $validationContext->setError('end_leaders', __('If the event end time for your leaders is really later than two weeks, please contact the administrator'));
            $fail = true;
    ***REMOVED***

        return $fail;
***REMOVED***

    /**
     * Validate the price of the event.
     *
     * @param float $price
     * @param ValidationContext $validationContext
     */
    private function validatePrice(float $price, ValidationContext $validationContext)
    ***REMOVED***
        if ($price < 0) ***REMOVED***
            $validationContext->setError('price', __('Price can not be negative'));
    ***REMOVED***

        if ($price >= 1000) ***REMOVED***
            $validationContext->setError('price', __('If the price is really this high, please contact the administrator'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate publication data of the event.
     *
     * @param bool $isPublic
     * @param int $publicizeAt
     * @param int $start
     * @param ValidationContext $validationContext
     */
    private function validatePublication(bool $isPublic, int $publicizeAt, int $start, ValidationContext $validationContext)
    ***REMOVED***
        if (!$isPublic) ***REMOVED***
            return;
    ***REMOVED***

        // TODO maybe remove offset of 8 hrs? YAGNI...
        if ($publicizeAt < time() - (60 * 60 * 8)) ***REMOVED***
            $validationContext->setError('publicize_at', __('The earliest publication time is now'));
    ***REMOVED***

        // TODO maybe add a offset of a few days?
        if ($publicizeAt > $start) ***REMOVED***
            $validationContext->setError('publicize_at', __('The event must be publicized before the start of the event'));
    ***REMOVED***
***REMOVED***
***REMOVED***
