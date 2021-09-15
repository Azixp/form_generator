<form action="/?action=createNewForm" method="post" id="creationForm">
    <input type="submit" value="Create form" class="btn btn-success mx-auto" id="creationButton">
</form>
<?= isset($message) ? '<div class="alert alert-success text-center mt-3">' . $message . '</div>' : '' ?>