<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <?php if (!$showForms) : ?>
        <title>Form Builder</title>
    <?php else : ?>
        <title>Create New Form</title>
    <?php endif; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- See https://fontawesome.com/v4.7.0/icons/ for more informations -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div id="header" class="d-flex align-content-between">
        <h1 class="col-12 display-3 text-center">Form Builder</h1>
    </div>
    <hr>
    <div id="main">
        <?php if ($showForms) : ?>
            <h3 class="title">My Forms</h3>
        <?php elseif($showForm) : ?>
            <h3 class="title">Form Details</h3>
        <?php else : ?>
            <h3 class="title">Build your form</h3>
        <?php endif; ?>
    </div>
    <div class="container">
        <?php if ($showForms) : ?>
            <a href="/" class="btn btn-secondary mb-3">Create Form</a>
        <?php elseif($showForm) : ?>
            <a href="/?action=showForms" class="btn btn-secondary mb-3">Show All forms</a>
        <?php else : ?>
            <button class="btn btn-info mb-3" id="addField">Add New Field</button>
            <a href="/?action=showForms" class="btn btn-secondary mb-3">Show All forms</a>
        <?php endif; ?>