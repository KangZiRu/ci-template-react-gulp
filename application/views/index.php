<div id="side-nav">
    <ul id="--nav-main">
        <li data-show="--body-home" class="active">HOME</li>
        <?php if ($this->session->level == 9): ?>
            <li data-show="--body-employee" onclick="employee.load()">EMPLOYEE</li>
            <li data-show="--body-schedule" onclick="schedule.load()">SCHEDULE</li>
            <li data-show="--body-calendar" onclick="calendar.load()">CALENDAR</li>
        <?php elseif ($this->session->level == 2): ?>
            <li data-show="--body-patient" onclick="patient.load()">PATIENT</li>
            <li data-show="--body-medical-record" onclick="medicalRecord.load()">MEDICAL RECORD</li>
        <?php endif; ?>
    </ul>
</div>

<div id="main-body">
    <div id="--body-home" class="main-item">
        <h1>Welcome!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione soluta deserunt, corporis impedit quisquam repellendus, labore temporibus doloribus expedita dolor cupiditate alias ea esse id minus laudantium dignissimos vel itaque.</p>
    </div>
    <div id="--body-employee" class="main-item">
        <div class="table-section">
            <div class="title">
                <h3>Employee</h3>
            </div>
            <div class="header">
                <button data-open-modal="rev-add-employee">ADD EMPLOYEE</button>
            </div>
            <div id="--table-employee" class="--table">
            </div>
        </div>


        <div id="rev-add-employee" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Add employee</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php echo base_url() ?>employee/add" id="add-employee-form" enctype="multipart/form-data">
                        <div class="--input">
                            <span>Name</span>
                            <input type="text" name="add-emp-name" placeholder="Name">
                        </div>
                        <div class="--input">
                            <span>Password</span>
                            <input type="password" name="add-emp-password" placeholder="Password">
                        </div>
                        <div class="--input">
                            <span>Salary</span>
                            <input type="number" name="add-emp-salary" placeholder="Salary">
                        </div>
                        <div class="--input">
                            <span>Level</span>
                            <select name="add-emp-level">
                                <option value="1">Doctor</option>
                                <option value="2">Admin</option>
                                <option value="9">SuperUser</option>
                            </select>
                        </div>
                        <div class="--input">
                            <span>Photo</span>
                            <input type="file" name="add-emp-photo">
                        </div>
                        <div class="--input">
                            <span>Note</span>
                            <textarea name="add-emp-note" placeholder="Note"></textarea>
                        </div>
                        <div class="--submit right">
                            <input type="submit" value="ADD">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="rev-ed-employee" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Edit employee</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php echo base_url() ?>employee/edit" id="ed-employee-form" enctype="multipart/form-data" autocomplete="off">
                        <div class="--input">
                            <span>Name</span>
                            <input type="text" name="ed-emp-name" placeholder="Name">
                        </div>
                        <div class="--input">
                            <span>Password</span>
                            <input type="password" name="ed-emp-password" placeholder="Password">
                        </div>
                        <div class="--input">
                            <span>Salary</span>
                            <input type="number" name="ed-emp-salary" placeholder="Salary">
                        </div>
                        <div class="--input">
                            <span>Level</span>
                            <select name="ed-emp-level">
                                <option value="1">Doctor</option>
                                <option value="2">Admin</option>
                                <option value="9">SuperUser</option>
                            </select>
                        </div>
                        <div class="--input">
                            <span>Photo</span>
                            <input type="file" name="ed-emp-photo">
                        </div>
                        <div class="--input">
                            <span>Note</span>
                            <textarea name="ed-emp-note" placeholder="Note"></textarea>
                        </div>
                        <div class="--submit right">
                            <input type="submit" value="SAVE">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="rev-del-employee" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Delete Employee</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <p>Are you sure want to delete this?</p>
                    <div class="--submit right">
                        <button id="employee-del-but" class="error">YES, DELETE</button>
                        <button class="secondary" data-modal-close>NO, CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="--body-schedule" class="main-item">
        <div class="table-section">
            <div class="title">
                <h3>Schedule</h3>
            </div>
            <div class="header">
                <button data-open-modal="rev-add-emp-sch">ADD</button>
            </div>
            <div id="--table-schedule">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th width="500px">Monday</th>
                            <th width="500px">Tuesday</th>
                            <th width="500px">Wednesday</th>
                            <th width="500px">Thursday</th>
                            <th width="500px">Friday</th>
                            <th width="500px">Saturday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($time_index = 1; $time_index < 14; $time_index++): ?>
                            <tr>
                                <td>
                                    <?php
                                    $time = 7 + $time_index;
                                    $time_to_print = $time < 10 ? '0'.$time : $time;

                                    echo $time_to_print.':00';
                                    ?>
                                </td>
                                <?php for ($day_index = 1; $day_index < 7; $day_index++): ?>
                                    <td id="schedule-<?php echo $time_index.'-'.$day_index ?>" class="schedule-box">
                                        <button data-t="<?php echo $time_index ?>" data-d="<?php echo $day_index ?>">ADD</button>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div id="rev-add-emp-sch" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Add employee schedule</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php base_url() ?>/" id="add-emp-sch-form" method="post" enctype="multipart/form-data">
                        <div class="--input">
                            <div class="search-box">
                                <input type="text" placeholder="Search employee" data-search-bar>
                                <input type="text" name="add-emp-sch-emp" data-id-bar hidden>
                                <ul data-list></ul>
                            </div>
                            <span>Employee</span>
                        </div>
                        <div class="--input">
                            <select name="add-emp-sch-day">
                                <?php
                                $days = ['', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                ?>
                                <?php for ($day = 1; $day < 7; $day++): ?>
                                    <option value="<?php echo $day ?>"><?php echo $days[$day] ?></option>
                                <?php endfor; ?>
                            </select>
                            <span>Day</span>
                        </div>
                        <div class="--input">
                            <select name="add-emp-sch-time">
                                <?php for ($time = 1; $time < 14; $time++): ?>
                                    <option value="<?php echo $time ?>">
                                        <?php
                                        $time_to_print = 7 + $time;
                                        echo ($time_to_print < 10 ? '0'.$time_to_print : $time_to_print).':00';
                                        ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                            <span>Time</span>
                        </div>

                        <div class="--submit right">
                            <input type="submit" value="ADD">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="--body-calendar" class="main-item">
        <div class="table-section">
            <div class="title"><h3>Calendar</h3></div>
            <div id="calendar-root"></div>

            <div id="rev-add-calendar-event" data-modal>
                <div class="content">
                    <div class="header">
                        <h3>Add event</h3>
                        <span data-modal-close>x</span>
                    </div>
                    <div class="body">
                        <form action="<?php echo base_url() ?>calendar/add_event"
                              id="add-calendar-event-form"
                              enctype="multipart/form-data">
                            <div class="--input">
                                <input type="text" name="add-calendar-event-name" placeholder="Event name">
                                <span>Event name</span>
                            </div>
                            <div class="--input">
                                <select name="add-calendar-event-is-day-off">
                                    <option value="0">Working day</option>
                                    <option value="1">Day off</option>
                                </select>
                                <span>Is day off</span>
                            </div>
                            <div class="--submit right">
                                <input type="submit" value="ADD">
                                <button class="secondary" data-modal-close>CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="--body-patient" class="main-item">
        <div class="table-section">
            <div class="title">
                <h3>Patient</h3>
            </div>
            <div class="header">
                <button data-open-modal="rev-add-patient">ADD PATIENT</button>
            </div>
            <div id="--table-patient" class="--table">
            </div>
        </div>

        <div id="rev-add-patient" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Add patient</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php echo base_url() ?>patient/add" id="add-patient-form" enctype="multipart/form-data">
                        <div class="--input">
                            <span>Name</span>
                            <input type="text" name="add-pat-name" placeholder="Name">
                        </div>
                        <div class="--input">
                            <span>Address</span>
                            <textarea name="add-pat-address" placeholder="Address"></textarea>
                        </div>
                        <div class="--input">
                            <span>Gender</span>
                            <select name="add-pat-gender">
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </div>
                        <div class="--input">
                            <span>Age</span>
                            <input type="number" name="add-pat-age" placeholder="Age">
                        </div>
                        <div class="--input">
                            <span>Telp</span>
                            <input type="number" name="add-pat-telp" placeholder="Telp">
                        </div>
                        <div class="--input">
                            <span>Is married</span>
                            <select name="add-pat-is-married">
                                <option value="0">Not married</option>
                                <option value="1">Married</option>
                            </select>
                        </div>
                        <div class="--input">
                            <span>Note</span>
                            <textarea name="add-pat-note" placeholder="Note"></textarea>
                        </div>
                        <div class="--submit right">
                            <input type="submit" value="ADD">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="rev-ed-patient" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Edit patient</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php echo base_url() ?>patient/edit" id="ed-patient-form" enctype="multipart/form-data">
                        <div class="--input">
                            <span>Name</span>
                            <input type="text" name="ed-pat-name" placeholder="Name">
                        </div>
                        <div class="--input">
                            <span>Address</span>
                            <textarea name="ed-pat-address" placeholder="Address"></textarea>
                        </div>
                        <div class="--input">
                            <span>Gender</span>
                            <select name="ed-pat-gender">
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </div>
                        <div class="--input">
                            <span>Age</span>
                            <input type="number" name="ed-pat-age" placeholder="Age">
                        </div>
                        <div class="--input">
                            <span>Telp</span>
                            <input type="number" name="ed-pat-telp" placeholder="Telp">
                        </div>
                        <div class="--input">
                            <span>Is married</span>
                            <select name="ed-pat-is-married">
                                <option value="0">Not married</option>
                                <option value="1">Married</option>
                            </select>
                        </div>
                        <div class="--input">
                            <span>Note</span>
                            <textarea name="ed-pat-note" placeholder="Note"></textarea>
                        </div>
                        <div class="--submit right">
                            <input type="submit" value="SAVE">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="rev-del-patient" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Delete patient</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <p>Are you sure want to delete this?</p>
                    <div class="--submit right">
                        <button id="patient-del-but" class="error">YES, DELETE</button>
                        <button class="secondary" data-modal-close>NO, CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="--body-medical-record" class="main-item">
        <div class="table-section">
            <div class="title">
                <h3>Medical Record</h3>
            </div>
            <div class="header">
                <button data-open-modal="rev-add-mr">ADD MEDICAL RECORD</button>
            </div>
            <div id="--table-medical-record" class="--table">
            </div>
        </div>


        <div id="rev-add-mr" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Add medical record</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php echo base_url() ?>medical_record/add" id="add-mr-form" enctype="multipart/form-data">
                        <div class="--input">
                            <span>Patient</span>
                            <div class="search-bar" data-source="<?php echo base_url() ?>/patient/search/">
                                <input  type="text"
                                        placeholder="Patient">
                                <select name="add-mr-patient"></select>
                            </div>
                        </div>
                        <div class="--input">
                            <span>Doctor</span>
                            <div class="search-bar" data-source="<?php echo base_url() ?>/employee/search/">
                                <input  type="text"
                                        placeholder="Doctor">
                                <select name="add-mr-doctor"></select>
                            </div>
                        </div>
                        <div class="--input">
                            <span>Fee</span>
                            <input type="number" name="add-mr-fee" placeholder="Fee">
                        </div>
                        <div class="--input">
                            <span>Check in</span>
                            <input type="datetime" name="add-mr-check-in" placeholder="Check in">
                        </div>
                        <div class="--input">
                            <span>Check out</span>
                            <input type="datetime" name="add-mr-check-out" placeholder="Check out">
                        </div>
                        <div class="--input">
                            <span>Note</span>
                            <textarea name="add-mr-note" placeholder="Note"></textarea>
                        </div>
                        <div class="--submit right">
                            <input type="submit" value="ADD">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="rev-ed-mr" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Edit medical record</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <form action="<?php echo base_url() ?>medical_record/edit" id="ed-mr-form" enctype="multipart/form-data">
                        <div class="--input">
                            <span>Patient</span>
                            <div class="search-bar" data-source="<?php echo base_url() ?>/patient/search/">
                                <input  type="text"
                                        placeholder="Patient">
                                <select name="ed-mr-patient"></select>
                            </div>
                        </div>
                        <div class="--input">
                            <span>Doctor</span>
                            <div class="search-bar" data-source="<?php echo base_url() ?>/employee/search/">
                                <input  type="text"
                                        placeholder="Doctor">
                                <select name="ed-mr-doctor"></select>
                            </div>
                        </div>
                        <div class="--input">
                            <span>Fee</span>
                            <input type="number" name="ed-mr-fee" placeholder="Fee">
                        </div>
                        <div class="--input">
                            <span>Check in</span>
                            <input type="datetime" name="ed-mr-check-in" placeholder="Check in">
                        </div>
                        <div class="--input">
                            <span>Check out</span>
                            <input type="datetime" name="ed-mr-check-out" placeholder="Check out">
                        </div>
                        <div class="--input">
                            <span>Note</span>
                            <textarea name="ed-mr-note" placeholder="Note"></textarea>
                        </div>
                        <div class="--submit right">
                            <input type="submit" value="SAVE">
                            <button class="secondary" data-modal-close>CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="rev-del-mr" data-modal>
            <div class="content">
                <div class="header">
                    <h3>Delete medical record</h3>
                    <span data-modal-close>x</span>
                </div>
                <div class="body">
                    <p>Are you sure want to delete this?</p>
                    <div class="--submit right">
                        <button id="mr-del-but" class="error">YES, DELETE</button>
                        <button class="secondary" data-modal-close>NO, CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
