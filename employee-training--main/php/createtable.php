<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traintech";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// skills
$sql = "CREATE TABLE SKILLS(SKILL_ID INT NOT NULL, SKILL_NAME VARCHAR(100) NOT
NULL , SKILL_TYPE VARCHAR(200) NOT NULL, SKILL_DESCRIPTION
VARCHAR(300),TRAINING_NEEDED VARCHAR(3) DEFAULT 'NO',PRIMARY
KEY(SKILL_ID));";

if ($conn->query($sql) === TRUE) {
  echo "Table skills created successfully <br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// course
$sql = "CREATE TABLE COURSE(COURSE_ID INT NOT NULL, COURSE_NAME
VARCHAR(200),DURATION_HOUR INT,DESCRIPTION VARCHAR(1000),INSTRUCTION
VARCHAR(200),PRIMARY KEY(COURSE_ID));";

if ($conn->query($sql) === TRUE) {
  echo "Table Course created successfully <br>";
} else {
  echo "Error creating table: " . $conn->error;
}
// training
$sql = "CREATE TABLE TRAINING (
    TRAINING_ID INT NOT NULL,
    START_DATE DATE NOT NULL,
    END_DATE DATE NOT NULL,
    DURATION_HOUR INT,
    COST INT,
    
    COURSE_ID INT NOT NULL,
    PERFORMANCE VARCHAR(100),
    FOREIGN KEY(COURSE_ID) REFERENCES COURSE(COURSE_ID) ON DELETE
    CASCADE,
    CHECK(END_DATE >= START_DATE),PRIMARY KEY(TRAINING_ID)
    );";

if ($conn->query($sql) === TRUE) {
  echo "Table Training created successfully <br>";
} else {
  echo "Error creating table: " . $conn->error;
}
//training category
$sql = "CREATE TABLE TRAINING_CATEGORY (
    TRAINING_CODE INT NOT NULL,
    TRAINING_NAME VARCHAR(200) NOT NULL,
    TRAINING_DESCRIPTION VARCHAR(1000) NOT NULL,
    TRAINGING_ID INT NOT NULL,
    FOREIGN KEY(TRAINGING_ID) REFERENCES TRAINING(TRAINING_ID) ON DELETE
    CASCADE,
    PRIMARY KEY(TRAINING_CODE)
    );";

if ($conn->query($sql) === TRUE) {
  echo "Table Training category created successfully <br>";
} else {
  echo "Error creating table: " . $conn->error;
}
// employee
$sql = "CREATE TABLE EMPLOYEE (
    EMPLOYEE_CODE INT NOT NULL,
    EMPLOYEE_NAME VARCHAR(200) NOT NULL,
    EMPLOYEE_COLLEGE VARCHAR(300) NOT NULL,
    EXPERIENCE_YEAR INT NOT NULL,
    PHONE_NUMBER INT(10) NOT NULL,
    SKILL_ID INT NOT NULL,
    TRAINING_ID INT NOT NULL,
    FOREIGN KEY(TRAINING_ID) REFERENCES TRAINING(TRAINING_ID) ON DELETE
    CASCADE,
    FOREIGN KEY(SKILL_ID) REFERENCES SKILLS(SKILL_ID) ON DELETE CASCADE,
    CHECK (
    PHONE_NUMBER <= 9999999999
    AND PHONE_NUMBER >= 6000000000
    ),
    PRIMARY KEY(EMPLOYEE_CODE)
    );";

if ($conn->query($sql) === TRUE) {
  echo "Table Employee created successfully <br>";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>