<?php
require_once('rest.class.php');

class Login extends Rest
{
    protected function _handleGet(): ?string
    {
        return $this->_unsupportedMethod();
    }

    protected function _handlePost(): ?string
    {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            http_response_code(403);

            $response = [
                'status_code' => 403,
                'developer_message' => 'Missing field.',
                'data' => [
                    'client_message' => 'Please enter all required fields.'
                ]
            ];
        } else {
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

            if ($email) {
                $db_connection = Rest::$database->getConnection();

                $login_sql = 'SELECT * FROM name_change.users WHERE email = :email';

                $prepared_statement = $db_connection->prepare($login_sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
                $prepared_statement->execute([':email' => $email]);

                $user_data = $prepared_statement->fetch();

                if (!empty($user_data)) {
                    if (password_verify($password, $user_data['password'])) {
                        // :TODO: Set session authentication code.

                        http_response_code(200);

                        $response = [
                            'status_code' => 200,
                            'developer_message' => 'Login success!',
                            'data' => [
                                'client_message' => 'Login success!'
                            ]
                        ];
                    } else {
                        http_response_code(403);

                        $response = [
                            'status_code' => 403,
                            'developer_message' => 'Invalid password.',
                            'data' => [
                                'client_message' => 'The password is not correct!'
                            ]
                        ];
                    }
                } else {
                    http_response_code(403);

                    $response = [
                        'status_code' => 403,
                        'developer_message' => 'Missing user.',
                        'data' => [
                            'client_message' => 'User not found.'
                        ]
                    ];
                }
            }
        }

        return json_encode($response);
    }
}

header("Content-Type: application/json; charset=UTF-8");

$login_endpoint = new Login();
print $login_endpoint->processRequest();
