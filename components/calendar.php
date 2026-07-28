<?php
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

$first_day = mktime(0, 0, 0, $month, 1, $year);
$max_days = date('t', $first_day);
$date_info = getdate($first_day);
$month_name = $date_info['month'];
$start_day_of_week = $date_info['wday']; 

$prev_month = $month - 1;
$prev_year = $year;
if ($prev_month == 0) { $prev_month = 12; $prev_year--; }

$next_month = $month + 1;
$next_year = $year;
if ($next_month == 13) { $next_month = 1; $next_year++; }
?>


<style>
    .calendar-container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .calendar-table th, .calendar-table td {
        width: 7.28% !important;
        padding: 6px 2px !important;
        vertical-align: middle;
    }
    .calendar-day-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 20px;
        height: 20px;
        font-size: 0.9rem;
    }
  
    @media (max-width: 450px) {
        .calendar-table th {
            font-size: 0.75rem;
        }
        .calendar-day-box {
            width: 16px;
            height: 16px;
            font-size: 0.8rem;
        }
    }
</style>

<div class="calendar-container px-2 mt-4">
    <div class="card bg-secondary text-white border-0 shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center bg-dark border-bottom border-secondary py-2 px-3">
            <a href="?month=<?= $prev_month ?>&year=<?= $prev_year ?>" class="btn btn-outline-warning btn-sm py-1 px-2">&lt; Prev</a>
            <h6 class="mb-0 fw-bold text-warning text-center" style="font-size: 1rem;"><?= $month_name . " " . $year ?></h6>
            <a href="?month=<?= $next_month ?>&year=<?= $next_year ?>" class="btn btn-outline-warning btn-sm py-1 px-2">Next &gt;</a>
        </div>
       
        <div class="card-body p-2 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-bordered table-dark text-center m-0 border-secondary calendar-table table-sm">
                    <thead>
                        <tr class="text-warning">
                            <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                        for ($i = 0; $i < $start_day_of_week; $i++) {
                            echo "<td></td>";
                        }

                        $current_day = 1;
                        $day_count = $start_day_of_week;

                        while ($current_day <= $max_days) {
                            if ($day_count == 7) {
                                echo "</tr><tr>";
                                $day_count = 0;
                            }

                            $is_today = ($current_day == date('d') && $month == date('m') && $year == date('Y')) ? 'bg-warning text-dark fw-bold rounded-circle' : '';
                            
                            echo "<td><span class='calendar-day-box $is_today'>$current_day</span></td>";

                            $current_day++;
                            $day_count++;
                        }

                        while ($day_count < 7 && $day_count > 0) {
                            echo "<td></td>";
                            $day_count++;
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
