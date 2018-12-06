<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 19:14
 */

namespace HotelApp\Domain\Helper\StateMachine;

abstract class State
{
    /** @var  string */
    protected static $name;

    /** @var  State[] */
    protected $previous;

    /** @var  State[] */
    protected $next;

    public function __construct()
    {
        $this->previous = [];
        $this->next = [];
    }


    /**
     * @param string|null $nextState
     * @return State|null
     */
    public function next(?string $nextState = null):?State
    {
        if ($nextState) {
            return self::allowState($nextState, $this->next);
        }
        return !empty($this->next) ? new $this->next[0]() : null;
    }

    /**
     * @param string|null $previousState
     * @return State|null
     */
    public function previous(?string $previousState = null):?State
    {
        if ($previousState) {
            return self::allowState($previousState, $this->previous);
        }

        return !empty($this->previous) ? new $this->previous[0]() : null;
    }

    /**
     * @param State $state
     * @param array $allowedStates
     * @return State
     * @throws \Exception
     */
    private static function allowState(string $state, array $allowedStates)
    {
        if (in_array($state, $allowedStates)) {
            return new $state();
        } else {
            throw new \Exception('Not allowed state - current state: ' . self::$name);
        }
    }
}