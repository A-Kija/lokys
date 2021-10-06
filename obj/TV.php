<?php


class TV {

    private $screenSize;
    private $owner = 'no';
    private $channel = 1;
    private $program = '';

    public static $cableTv = [1 => 'TV3', 2 => 'Animal Planet', 3 => 'Sport Super'];

    private static $tv;

    public static function create($screenSize)
    {
        return self::$tv ?? self::$tv = new self($screenSize);
    }


    private function __construct($screenSize) 
    {
        $this->screenSize = $screenSize;
    }


    public function sell($name)
    {
        $this->owner = $name;
    }


    public function changeChannel($number)
    {
        $this->program = self::$cableTv[$number];
        $this->channel = $number;
    }


    public function report($tv)
    {
        _d([
            'owner' => $this->owner,
            'channel' => $this->channel,
            'program' => $this->program,
            'screenSize' => $this->screenSize
        ], $tv);
    }


}