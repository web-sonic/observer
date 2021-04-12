<?php

namespace Observer;

interface Observer
{
    public function notify($obj);
}
