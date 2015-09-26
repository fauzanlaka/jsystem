<br>
<?php
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $income_year = mysqli_real_escape_string($con, $_POST['income_year']);
    $ft_id = mysqli_real_escape_string($con, $_POST['ft_id']);
    $dp_id = mysqli_real_escape_string($con, $_POST['dp_id']);
    $firstname_rumi = mysqli_real_escape_string($con, $_POST['firstname_rumi']);
    $lastname_rumi = mysqli_real_escape_string($con, $_POST['lastname_rumi']);
    $firstname_jawi = mysqli_real_escape_string($con, $_POST['firstname_jawi']);
    $lastname_jawi = mysqli_real_escape_string($con, $_POST['lastname_jawi']);
    $firstname_eng = mysqli_real_escape_string($con, $_POST['firstname_eng']);
    $lastname_eng = mysqli_real_escape_string($con, $_POST['lastname_eng']);
    $cityzen_id = mysqli_real_escape_string($con, $_POST['cityzen_id']);
    $birdth_date = mysqli_real_escape_string($con, $_POST['birdth_date']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
    $father_lastname = mysqli_real_escape_string($con, $_POST['father_lastname']);
    $father_job = mysqli_real_escape_string($con, $_POST['father_job']);
    $mother_name = mysqli_real_escape_string($con, $_POST['mother_name']);
    $mother_lastname = mysqli_real_escape_string($con, $_POST['mother_lastname']);
    $mother_job = mysqli_real_escape_string($con, $_POST['mother_job']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $ibtidai_graduate = mysqli_real_escape_string($con, $_POST['ibtidai_graduate']);
    $ibtidai_graduate_year = mysqli_real_escape_string($con, $_POST['ibtidai_graduate_year']);
    $mutawasit_graduate = mysqli_real_escape_string($con, $_POST['ibtidai_graduate_year']);
    $mutawasit_graduate_year = mysqli_real_escape_string($con, $_POST['mutawasit_graduate_year']);
    $sanawi_graduate = mysqli_real_escape_string($con, $_POST['sanawi_graduate']);
    $sanawi_graduate_year = mysqli_real_escape_string($con, $_POST['sanawi_graduate_year']);
    $down_graduate = mysqli_real_escape_string($con, $_POST['down_graduate']);
    $down_graduate_year = mysqli_real_escape_string($con, $_POST['down_graduate_year']);
    $first_highschool_graduate = mysqli_real_escape_string($con, $_POST['first_highschool_graduate']);
    $first_highschool_graduate_year = mysqli_real_escape_string($con, $_POST['first_highschool_graduate_year']);
    $second_highschool_graduate = mysqli_real_escape_string($con, $_POST['second_highschool_graduate']);
    $second_highschool_graduate_year = mysqli_real_escape_string($con, $_POST['second_highschool_graduate_year']);
    $melayu_lang_skill = mysqli_real_escape_string($con, $_POST['melayu_lang_skill']);
    $arab_lang_skill = mysqli_real_escape_string($con, $_POST['arab_lang_skill']);
    $ingris_lang_skill = mysqli_real_escape_string($con, $_POST['ingris_lang_skill']);
    $thai_lang_skill = mysqli_real_escape_string($con, $_POST['thai_lang_skill']);
    $certificate = mysqli_real_escape_string($con, $_POST['certificate']);
    $citizen_book = mysqli_real_escape_string($con, $_POST['citizen_book']);
    $id_book = mysqli_real_escape_string($con, $_POST['id_book']);
    $photo = mysqli_real_escape_string($con, $_POST['photo']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $gender = $_POST['gender'];
    
    //Check nomor pokok supa
    $check = mysqli_query($con , "SELECT * FROM students WHERE student_id='$student_id'");
    $result = mysqli_fetch_array($check);
    
    if($result[0] > 0){
        $data = '1' ;
    }else{
        $data = '2';
    }
    switch($data) {
        case '1':
            include 'module/student/noalert.php';
            break;
        case '2':
            include 'module/student/addstudent.php';
            break;
    }
?>




