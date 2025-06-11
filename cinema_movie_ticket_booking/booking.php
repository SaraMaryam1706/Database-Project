<?php
session_start();

if (empty($_SESSION["username"])) {
    header("location:index.php");
    exit;
}

include("header.php");

$con = new connec();
$result = $con->select_show();
$result1 = $con->select_time();

// Get show and time from URL
$show_id = isset($_GET['show_id']) ? (int)$_GET['show_id'] : 0;
$show_time_id = isset($_GET['show_time_id']) ? (int)$_GET['show_time_id'] : 0;

$booked_seats = [];
if ($show_id > 0 && $show_time_id > 0) {
    // Filter by both show and time
    $sql = "SELECT seat_number FROM seat_reserved WHERE show_id = $show_id AND show_time_id = $show_time_id";
    $result2 = $con->conn->query($sql);
    if ($result2 && $result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $booked_seats[] = $row['seat_number'];
        }
    }
}

// Handle form submission
if (isset($_POST["btn_booking"])) {
    $cust_id = (int)$_POST["cust_id"];
    $show_id = (int)$_POST["show_id"];
    $show_time_id = (int)$_POST["show_time_id"];
    $no_ticket = isset($_POST["no_ticket"]) ? (int)$_POST["no_ticket"] : 0;
    $booking_date = htmlspecialchars($_POST["booking_date"]);
    $seat_number = isset($_POST["seat_dt"]) ? htmlspecialchars($_POST["seat_dt"]) : "";
    $seat_arr = explode(", ", $seat_number);
    $total_amount = 600 * $no_ticket;

    // Basic validations
    if ($show_id <= 0 || $show_time_id <= 0) {
        echo "<script>alert('Please select both show and time before booking.');</script>";
    } elseif ($no_ticket <= 0 || empty($seat_number)) {
        echo "<script>alert('Please select at least one seat to continue.');</script>";
    } else {
        $sql = "INSERT INTO seat_detail VALUES (0, $cust_id, $show_id, $no_ticket)";
        $seat_dt_id = $con->insert_lastid($sql);

        $sql = "INSERT INTO booking VALUES (0, $cust_id, $show_id, $no_ticket, $seat_dt_id, '$booking_date', $total_amount)";
        $con->insert($sql, "Your booking is complete! Check your email for payment details!");

        foreach ($seat_arr as $item) {
            $item = htmlspecialchars($item);
            $sql = "INSERT INTO seat_reserved VALUES (0, $show_id, $show_time_id, $cust_id, '$item', '1')";
            $con->insert_lastid($sql);
        }
    }
}
?>


<style>
.seat { background-color: gray; color:white; padding:10px; border-radius:5px; }
.seat input[type="checkbox"] { display: none }
.seat.isAllowed input[type="checkbox"] { display: inline }
.seat.isAllowed { background-color: black; }
</style>

<script>
const bookedSeats = <?php echo json_encode($booked_seats); ?>;

function updateURL() {
    const showId = document.getElementById("show_id").value;
    const showTime = document.getElementById("show_time").value;
    if (showId && showTime) {
        window.location.href = `booking.php?show_id=${showId}&show_time_id=${showTime}`;
    }
}

function checkboxtotal() {
    let seat = [];
    $('input[name="seat_chart[]"]:checked').each(function() {
        seat.push($(this).val());
    });
    let st = seat.length;
    $('#no_ticket').val(st);
    $('#total_amount').val("Rs. " + (st * 600));
    $('#seat_dt').val(seat.join(", "));
}

$(document).ready(function () {
    for (let i = 1; i <= 4; i++) {
        for (let j = 1; j <= 10; j++) {
            const seatId = 'R' + i + 'S' + j;
            $('#seat_chart').append(
                `<div class="col-md-3 text-center mt-2">
                    <div class="seat" id="seat-${seatId}">
                        <input type="checkbox" value="${seatId}" name="seat_chart[]" onclick="checkboxtotal()" class="mr-2" />
                        ${seatId}
                    </div>
                </div>`
            );
        }
    }

    const selectedShow = "<?php echo $show_id; ?>";
    const selectedTime = "<?php echo $show_time_id; ?>";

    if (selectedShow && selectedTime) {
        bookedSeats.forEach(seatId => {
            const el = document.getElementById(`seat-${seatId}`);
            if (el) el.classList.remove("isAllowed");
        });

        for (let i = 1; i <= 4; i++) {
            for (let j = 1; j <= 10; j++) {
                const seatId = 'R' + i + 'S' + j;
                if (!bookedSeats.includes(seatId)) {
                    const el = document.getElementById(`seat-${seatId}`);
                    if (el) el.classList.add("isAllowed");
                }
            }
        }
    }
});
</script>

<style>
html, body { height: 100%; margin: 0; }
.register-container {
    min-height: 100vh; display: flex; align-items: center;
    justify-content: center; background-color: #f5f5f5;
}
.register-form {
    background: white; padding: 30px; border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px;
}
.register-form input, .register-form select {
    width: 100%; padding: 5px; margin: 8px 0 16px;
    border: 1px solid #ccc; border-radius: 5px;
}
.register-form button {
    background-color: black; color: white; padding: 12px; width: 100%;
    border: none; border-radius: 5px; font-size: 16px;
}
.register-form button:hover { background-color: #333; }
</style>

<section class="register-container">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div id="seat-map"><br>
                    <h3 class="text_center" style="color:black;">Select Seat</h3>
                    <hr>
                    <label class="text-center" style="width:100%; background-color:black; color:white;padding:2%">SCREEN</label>
                    <div class="row" id="seat_chart"></div>
                </div><hr>
            </div>
            <div class="col-md-5">
                <form method="post" class="register-form" action="booking.php">
                    <input type="hidden" name="cust_id" value="<?php echo $_SESSION["cust_id"]; ?>">
                    <h2 class="text-center mb-3">Booking</h2>
                    <p class="text-center">Please fill this form to book a ticket</p>
                    <hr>

                    <label><b>Show</b></label>
                    <select class="form-control" name="show_id" id="show_id" onchange="updateURL()" required>
                        <option value="">Select show</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row["id"] == $show_id) ? "selected" : "";
                                echo "<option value='{$row["id"]}' $selected>{$row["movie_name"]} ({$row["show_date"]})</option>";
                            }
                        }
                        ?>
                    </select>

                    <label><b>Select time</b></label>
                    <select class="form-control" name="show_time_id" id="show_time" onchange="updateURL()" required>
                        <option value="">Select time</option>
                        <?php
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                $selected = ($row["id"] == $show_time_id) ? "selected" : "";
                                echo "<option value='{$row["id"]}' $selected>{$row["time"]}</option>";
                            }
                        }
                        ?>
                    </select>

                    <label><b>No of Tickets</b></label>
                    <input type="number" name="no_ticket" id="no_ticket" require onkeydown="return false;">

                    <label><b>Seat Detail</b></label>
                    <input type="text" name="seat_dt" id="seat_dt" readonly>

                    <label><b>Total amount</b></label>
                    <input type="text" name="total_amount" id="total_amount" readonly>

                    <label><b>Booking Date</b></label>
                    <input type="date" name="booking_date" id="booking_date" required value="<?php echo date('Y-m-d'); ?>" readonly>

                    <hr>
                    <button type="submit" name="btn_booking">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>
