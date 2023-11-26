<?php

class BoxerController
{
    public function __construct(private Operations $operations)
    {
    }

    public function processRequest(string $method, ?string $dni): void
    {
        if ($dni) {

            $this->processResourceRequest($method, $dni);
        } else {

            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, string $dni): void
    {
        $boxer = $this->operations->getBoxer($dni);        

        if (!$boxer) {
            http_response_code(404);
            echo json_encode(["message" => "Boxer not found"]);
            return;
        }

        switch ($method) {
            case "GET":
                echo json_encode($boxer);
                break;

            case "PATCH":
                $data = (array) json_decode(file_get_contents("php://input"), true);
                
                $errors = $this->getValidationErrors($data, false);

                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }
                
                $rows = $this->operations->updateBoxer($boxer, $data);

                echo json_encode([
                    "message" => "Boxer $dni updated",
                    "rows" => $rows
                ]);
                break;

            case "DELETE":
                $rows = $this->operations->deleteBoxer($dni);

                echo json_encode([
                    "message" => "Boxer $dni deleted",
                    "rows" => $rows
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, PATCH, DELETE");
        }
    }

    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->operations->boxerList());
                break;

            case "POST":
                $data = (array) json_decode(file_get_contents("php://input"), true);
                $errors = $this->getValidationErrors($data);


                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $dni = $this->operations->addBoxer($data);

                http_response_code(201);
                echo json_encode([
                    "message" => "Boxer created",
                    "dni" => $dni
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }

    private function getValidationErrors(array $data, bool $is_new = true): array
    {
        $errors = [];

        if ($is_new && empty($data["name"])) {
            $errors[] = "name is required";
        }

        if ($is_new && empty($data["surname"])) {
            $errors[] = "surname is required";
        }

        if (array_key_exists("wins", $data)) {
            if (filter_var($data["wins"], FILTER_VALIDATE_INT) === false) {
                $errors[] = "wins must be an integer";
            }
        }

        if (array_key_exists("losses", $data)) {
            if (filter_var($data["losses"], FILTER_VALIDATE_INT) === false) {
                $errors[] = "losses must be an integer";
            }
        }
        if (array_key_exists("draws", $data)) {
            if (filter_var($data["draws"], FILTER_VALIDATE_INT) === false) {
                $errors[] = "draws must be an integer";
            }
        }

        return $errors;
    }
}
