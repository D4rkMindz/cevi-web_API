<?php


namespace App\Util;


class PhonenumberConverter
***REMOVED***
    /**
     * @var string $phonenumber phonenumber to convert
     */
    protected $phonenumber;
    /**
     * Convert.
     *
     * Function to call to convert a phonenumber into appropriate string.
     *
     * @param string $phonenumber
     * @return string $phonenumber
     */
    public function convert(string $phonenumber): string
    ***REMOVED***
        $this->phonenumber = $phonenumber;
        $this->trim()
            ->replaceFirstZeros()
            ->removeDuplicatedPlus()
            ->addCountryCode()
            ->addPlus();
        return $this->phonenumber;
***REMOVED***
    /**
     * Trim phonenumber.
     *
     * Remove all unnecessary spaces from the phonenumber.
     *
     * @return $this
     */
    protected function trim(): PhonenumberConverter
    ***REMOVED***
        $this->phonenumber = str_replace(' ', '', $this->phonenumber);
        return $this;
***REMOVED***
    /**
     * Replace heading zeros.
     *
     * @return $this
     */
    protected function replaceFirstZeros(): PhonenumberConverter
    ***REMOVED***
        if (substr($this->phonenumber, 0, 2) == '00') ***REMOVED***
            $number = ltrim($this->phonenumber, 0);
            $this->phonenumber = '+' . $number;
    ***REMOVED***
        return $this;
***REMOVED***
    /**
     * Remove duplicated plus.
     *
     * @return $this
     */
    protected function removeDuplicatedPlus(): PhonenumberConverter
    ***REMOVED***
        if (substr($this->phonenumber, 0, 2) == '++') ***REMOVED***
            $number = ltrim($this->phonenumber, '+');
            $this->phonenumber = '+' . $number;
    ***REMOVED***
        return $this;
***REMOVED***
    /**
     * Add country code.
     *
     * @return $this
     */
    protected function addCountryCode(): PhonenumberConverter
    ***REMOVED***
        if (substr($this->phonenumber, 0, 1) == '0') ***REMOVED***
            $number = ltrim($this->phonenumber, '0');
            $this->phonenumber = '+41' . $number;
    ***REMOVED***
        return $this;
***REMOVED***
    /**
     * Add plus.
     *
     * Add one heading plus to the phonenumber.
     *
     * @return $this
     */
    protected function addPlus(): PhonenumberConverter
    ***REMOVED***
        if (substr($this->phonenumber, 0, 1) != '+') ***REMOVED***
            $this->phonenumber = '+' . $this->phonenumber;
    ***REMOVED***
        return $this;
***REMOVED***
***REMOVED***
