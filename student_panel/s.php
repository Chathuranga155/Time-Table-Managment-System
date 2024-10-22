<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', '_sms');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handle Insert Event Request
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $description = $_POST['description'];
    $url = $_POST['url'];

    $stmt = $conn->prepare("INSERT INTO s_time_table (name, start_time, end_time, description, url, class, section, editor_id) VALUES (?, ?, ?, ?, ?, 'class1', 'A', '1')");
    $stmt->bind_param("sssss", $name, $start, $end, $description, $url);
    $stmt->execute();
    echo "Event added successfully";
    exit;
}

// Fetch Events
$result = $conn->query("SELECT * FROM s_time_table");
$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['s_no'],
        'title' => $row['name'],
        'start' => $row['start_time'],
        'end' => $row['end_time'],
        'description' => $row['description'],
        'url' => $row['url'],
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#eventModal">Add New Event</button>
    <div id="calendar"></div>
</div>

<!-- Add/Edit Event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <input type="hidden" name="id" id="eventId">
                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" name="name" id="eventName" required>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="datetime-local" class="form-control" name="start" id="startDate" required>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="datetime-local" class="form-control" name="end" id="endDate" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="eventDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Event URL</label>
                        <input type="url" class="form-control" name="url" id="eventUrl">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEventBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize FullCalendar
    $('#calendar').fullCalendar({
        events: <?php echo json_encode($events); ?>,
        selectable: true,
        selectHelper: true,
        editable: true,

        // On Date Click, Open Modal and Set Dates for New Event
        select: function(start, end) {
            $('#eventForm')[0].reset(); // Clear form for new event
            $('#startDate').val(moment(start).format('YYYY-MM-DDTHH:mm'));
            $('#endDate').val(moment(end).format('YYYY-MM-DDTHH:mm'));
            $('#eventModal').modal('show');
        },

        // Populate Modal with Existing Event Data on Click
        eventClick: function(event) {
            $('#eventId').val(event.id);
            $('#eventName').val(event.title);
            $('#startDate').val(moment(event.start).format('YYYY-MM-DDTHH:mm'));
            $('#endDate').val(moment(event.end).format('YYYY-MM-DDTHH:mm'));
            $('#eventDescription').val(event.description);
            $('#eventUrl').val(event.url);
            $('#eventModal').modal('show');
        }
    });

    // Save Event
    $('#saveEventBtn').on('click', function() {
        var formData = $('#eventForm').serialize();
        $.post('s.php', formData, function(response) {
            alert(response);
            location.reload();
        });
    });
});
</script>
</body>
</html>
