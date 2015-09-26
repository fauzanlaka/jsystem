<?php
$sql = mysqli_query($con, "INSERT INTO 
                students (student_id,income_year,ft_id,dp_id,firstname_rumi,lastname_rumi,firstname_jawi,
                          lastname_jawi,firstname_eng,lastname_eng,cityzen_id,birdth_date,disease,father_name,
                          father_lastname,father_job,mother_name,mother_lastname,mother_job,email,telephone,
                          ibtidai_graduate,ibtidai_graduate_year,mutawasit_graduate,mutawasit_graduate_year,
                          sanawi_graduate,sanawi_graduate_year,down_graduate,down_graduate_year,first_highschool_graduate,
                          first_highschool_graduate_year,second_highschool_graduate,second_highschool_graduate_year,
                          melayu_lang_skill,arab_lang_skill,ingris_lang_skill,thai_lang_skill,certificate,citizen_book,
                          id_book,photo,password,gender)
                values ('$student_id','$income_year','$ft_id','$dp_id','$firstname_rumi','$lastname_rumi',
                        '$firstname_jawi','$lastname_jawi','$firstname_eng','$lastname_eng','$cityzen_id','$birdth_date','$disease',
                        '$father_name','$father_lastname','$father_job','$mother_name','$mother_lastname','$mother_job',
                        '$email','$telephone','$ibtidai_graduate','$ibtidai_graduate_year','$mutawasit_graduate',
                        '$mutawasit_graduate_year','$sanawi_graduate','$sanawi_graduate_year','$down_graduate','$down_graduate_year',
                        '$first_highschool_graduate','$first_highschool_graduate_year','$second_highschool_graduate',
                        '$second_highschool_graduate_year','$melayu_lang_skill','$arab_lang_skill','$ingris_lang_skill',
                        '$thai_lang_skill','$certificate','$citizen_book','$id_book','$photo','$password','$gender')
            ");

    $sql = mysqli_query($con, "SELECT * FROM students WHERE student_id='$student_id'");
    $rs = mysqli_fetch_array($sql);
    $id = $rs['st_id'];
?>
<meta http-equiv="refresh" content="0;url=main.php?page=student&&studentpage=addthaistudent&&id=<?= $id ?>">