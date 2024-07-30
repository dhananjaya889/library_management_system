<?php

    require_once__DIR__ ."/models/User.php";



class Router
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    private function setCorsHeaders() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }

    public function route()
    {
        $this->setCorsHeaders();

        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = trim($path, '/');
        $parts = explode('/', $path);

        if ($requestMethod === 'OPTIONS') {
            // Pre-flight request for CORS
            http_response_code(200);
            exit;
        }


        if (count($parts) > 0) {
            array_shift($parts);
            array_shift($parts);
            array_shift($parts);
            $entity = array_shift($parts);
            $id = array_shift($parts);
            if ($entity == 'users') {
                switch ($requestMethod) {
                    case 'GET':
                        if ($id) {
                            echo json_encode($this->user->findById($id)->fetch_assoc());
                        } else {
                            $result = $this->user->getAll();
                            $users = [];
                            while ($row = $result->fetch_assoc()) {
                                $users[] = $row;
                            }
                            echo json_encode($users);
                        }
                        break;

                    case 'POST':
                        $data = json_decode(file_get_contents('php://input'), true);
                        if (isset($data['email']) && isset($data['password'])) {
                            // Handle login
                            $email = $data['email'];
                            $password = $data['password'];
                            $result = $this->user->login($email, $password);
                            if ($result) {
                                echo json_encode(['message' => 'Login successful']);
                            } else {
                                throw new Exception("Invalid credentials");
                            }
                        } else {
                            echo json_encode($this->user->create($data['values']));
                        }
                        break;

                    case 'PUT':
                        $data = json_decode(file_get_contents('php://input'), true);
                        echo json_encode($this->user->update($data['values'], $id));
                        break;

                    case 'DELETE':
                        echo json_encode($this->user->delete($id));
                        break;

                    default:
                        http_response_code(405);
                        echo json_encode(['message' => 'Method Not Allowed']);
                        break;
                }
            } else {
                http_response_code(404);
                echo json_encode(['message' => 'Not Found']);
            }
        }
    }
}


?>