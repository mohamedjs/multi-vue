<?php

interface LoggerInterface 
{
    public function log();
}

class Logger 
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function log()
    {
        $this->logger->log();
    }
}

class DataBaseLogger implements LoggerInterface
{
    public function log() 
    {
        dd('DataBase Logger');
    }
}

class FileLogger implements LoggerInterface
{
    public function log() 
    {
        dd('File Logger');
    }
}

$logger = new Logger(new DataBaseLogger);

$logger->log();

