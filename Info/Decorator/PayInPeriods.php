<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PeriodType;
use fall1600\Package\Ecpay\Info\Info;

class PayInPeriods extends Info
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string
     */
    protected $periodType;

    /**
     * @var int
     */
    protected $frequency;

    /**
     * @var int
     */
    protected $times;

    /**
     * PeriodReturnURL
     * @var string
     */
    protected $periodReturnUrl;

    public function __construct(Info $info, string $periodType, int $frequency, int $times, string $periodReturnUrl)
    {
        $this->info = $info;

        $this->setPeriodType($periodType);

        $this->setFrequency($frequency);

        $this->setTimes($times);

        $this->periodReturnUrl = $periodReturnUrl;
    }

    /**
     * 綠界會依此次授權金額[PeriodAmount]所設定的金額做為之後固定授權的金額。
     * 交易金額[TotalAmount]設定金額必須和授權金額[PeriodAmount]相同。
     * 請帶整數,不可有小數點。僅限新台幣。
     * @return array
     */
    public function getInfo()
    {
        $result = $this->info->getInfo();

        return $result +
            [
                'PeriodAmount' => $result['TotalAmount'],
                'PeriodType' => $this->periodType,
                'Frequency' => $this->frequency,
                'ExecTimes' => $this->times,
                'PeriodReturnURL' => $this->periodReturnUrl,
            ];
    }

    protected function setPeriodType(string $periodType)
    {
        if (! PeriodType::isValid($periodType)) {
            throw new \LogicException('unsupported period type');
        }

        $this->periodType = $periodType;
    }

    protected function setFrequency(int $frequency)
    {
        switch ($this->periodType) {
            case PeriodType::DAY:
                if ($frequency < 1 || $frequency > 365) {
                    throw new \LogicException('unsupported frequency in day');
                }
                break;
            case PeriodType::MONTH:
                if ($frequency < 1 || $frequency > 12) {
                    throw new \LogicException('unsupported frequency in month');
                }
                break;
            case PeriodType::YEAR:
                if ($frequency != 1) {
                    throw new \LogicException('unsupported frequency in year');
                }
                break;
            default:
                throw new \LogicException('unsupported frequency');
        }

        $this->frequency = $frequency;
    }

    protected function setTimes(int $times)
    {
        switch ($this->periodType) {
            case PeriodType::DAY:
                if ($times <= 1 || $times > 999) {
                    throw new \LogicException('unsupported times in day');
                }
                break;
            case PeriodType::MONTH:
                if ($times <= 1 || $times > 99) {
                    throw new \LogicException('unsupported times in month');
                }
                break;
            case PeriodType::YEAR:
                if ($times <= 1 || $times > 9) {
                    throw new \LogicException('unsupported times in year');
                }
                break;
            default:
                throw new \LogicException('unsupported times');
        }

        $this->times = $times;
    }
}
