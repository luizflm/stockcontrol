<?php
namespace src;

class Config {
    const BASE_DIR = '/stock_control/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost:3306';
    const DB_DATABASE = 'stock_control';
    CONST DB_USER = 'root';
    const DB_PASS = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}