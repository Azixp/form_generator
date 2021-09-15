<?php

use App\model\FormManager;
use App\controller\FormController;
use App\form\EmailType;

require __DIR__ . '/../vendor/autoload.php';


$formManager = new FormManager;
$formController = new FormController($formManager);

$showForms = isset($_GET['action']) && $_GET['action'] === 'showForms';
$showForm = isset($_GET['action'], $_GET['form']) && $_GET['action'] === 'show';
$deleteForm = isset($_GET['action'], $_GET['form']) && $_GET['action'] === 'delete';


require __DIR__ . '/../src/view/header.html.php';
if ($showForms) {
    $formController->showForms();
} else if ($showForm) {
    $formController->showForm();
} else if ($deleteForm) {
    $formController->deleteForm();
} else {
    $formController->createForm();
}
require __DIR__ . '/../src/view/footer.html.php';
