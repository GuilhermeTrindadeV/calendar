<?php 
	session_start();
?>

<?php 
    $this->layout("_theme", [
        "title" => "Calendário | Agenda",
        "items" => $items
    ])
?>

<?php 
    $this->insert('components/event-details'); 
    $this->insert('/save-event');
?>



<div class="bg" id="bg">
    <?php 
        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="calendar">
    </div>
</div>