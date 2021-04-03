<?php
// The purpose of this class is to handle REST operations.
// This class needs to be extended.
require_once('database.class.php');

abstract class Rest
{
    abstract protected function _handleGet();
    abstract protected function _handlePost();

    static ?Database $database = null;

    public function processRequest(): ?string
    {
        if (self::$database === null) {
            // Normally, I wouldn't put credentials in code like this, but for
            // the purposes of this prototype, I've added them here for
            // convenience.
            self::$database = new Database('mysql', 'name_change', 'root', 'secret');
        }

        $request_method = $_SERVER['REQUEST_METHOD'];

        $response = match($request_method) {
            'GET' => $this->_handleGet(),
            'POST' => $this->_handlePost(),
            default => $this->_unsupportedMethod()
        };

        return $response;
    }

    protected function _unsupportedMethod(): string
    {
        http_response_code(405);

        $response = [
            'status_code' => 405,
            'developer_message' => 'Unsupported request method.',
            'data' => []
        ];

        return json_encode($response);
    }
}
