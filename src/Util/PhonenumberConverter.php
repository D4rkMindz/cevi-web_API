<?php


namespace App\Util;


class PhonenumberConverter
{
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
    {
        $this->phonenumber = $phonenumber;
        $this->trim()
            ->replaceFirstZeros()
            ->removeDuplicatedPlus()
            ->addCountryCode()
            ->addPlus();
        return $this->phonenumber;
    }
    /**
     * Trim phonenumber.
     *
     * Remove all unnecessary spaces from the phonenumber.
     *
     * @return $this
     */
    protected function trim(): PhonenumberConverter
    {
        $this->phonenumber = str_replace(' ', '', $this->phonenumber);
        return $this;
    }
    /**
     * Replace heading zeros.
     *
     * @return $this
     */
    protected function replaceFirstZeros(): PhonenumberConverter
    {
        if (substr($this->phonenumber, 0, 2) == '00') {
            $number = ltrim($this->phonenumber, 0);
            $this->phonenumber = '+' . $number;
        }
        return $this;
    }
    /**
     * Remove duplicated plus.
     *
     * @return $this
     */
    protected function removeDuplicatedPlus(): PhonenumberConverter
    {
        if (substr($this->phonenumber, 0, 2) == '++') {
            $number = ltrim($this->phonenumber, '+');
            $this->phonenumber = '+' . $number;
        }
        return $this;
    }
    /**
     * Add country code.
     *
     * @return $this
     */
    protected function addCountryCode(): PhonenumberConverter
    {
        if (substr($this->phonenumber, 0, 1) == '0') {
            $number = ltrim($this->phonenumber, '0');
            $this->phonenumber = '+41' . $number;
        }
        return $this;
    }
    /**
     * Add plus.
     *
     * Add one heading plus to the phonenumber.
     *
     * @return $this
     */
    protected function addPlus(): PhonenumberConverter
    {
        if (substr($this->phonenumber, 0, 1) != '+') {
            $this->phonenumber = '+' . $this->phonenumber;
        }
        return $this;
    }
}
