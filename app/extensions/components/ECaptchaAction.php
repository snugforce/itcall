<?php
/**

 */
class ECaptchaAction extends CCaptchaAction
{
    /**
     * Generates a new verification code.
     * @return string the generated verification code
     */

	protected function generateVerifyCode()
	{
		if($this->minLength > $this->maxLength)
			$this->maxLength = $this->minLength;
		if($this->minLength < 3)
			$this->minLength = 3;
		if($this->maxLength > 20)
			$this->maxLength = 20;
		$length = mt_rand($this->minLength,$this->maxLength);
        /*
		$letters = '567890';
		$vowels = 'abcd';
		$code = '';
		for($i = 0; $i < $length; ++$i)
		{
			if($i % 2 && mt_rand(0,10) > 2 || !($i % 2) && mt_rand(0,10) > 9)
				$code.=$vowels[mt_rand(0,4)];
			else
				$code.=$letters[mt_rand(0,6)];
		}
        */
        $letters='1234567890';
        $code='';
        for($i=0;$i<$length;++$i)
        {
            $code.=$letters[rand(0, strlen($letters)-1)];
        }

		return $code;
	}
}