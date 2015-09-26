<?php
    //Get total student
    $total_student = mysqli_query($con, "SELECT * FROM students");
    $total_student_data = mysqli_num_rows($total_student);
    
    //Get total male student
    $total_student_male = mysqli_query($con, "SELECT * FROM students WHERE gender='Lelaki'");
    $total_student_data_male = mysqli_num_rows($total_student_male);
    
    //Get total female student
    $total_student_female = mysqli_query($con, "SELECT * FROM students WHERE gender='Perempuan'");
    $total_student_data_female = mysqli_num_rows($total_student_female);
    
    //Get students aktif :-
    // Step 1 : get current term and academic year from register table
    $current_ty = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_current_ty = mysqli_fetch_array($current_ty);
    $term = $rs_current_ty['term_id'];
    $year = $rs_current_ty['year'];
    //Step 2 : Get total student active count
    $active_students = mysqli_query($con, "SELECT st.*,sr.* FROM students st 
                     RIGHT JOIN student_register sr ON st.st_id=sr.sr_id
                     WHERE sr.academic_year='$year' and sr.term='$term'
                     ");
    $rs_active_students = mysqli_num_rows($active_students);
    
    //Get students male aktif :-
    $active_students_male = mysqli_query($con, "SELECT st.*,sr.* FROM students st 
                     RIGHT JOIN student_register sr ON st.st_id=sr.sr_id
                     WHERE st.gender='Lelaki' and sr.academic_year='$year' and sr.term='$term'
                     ");
    $rs_active_students_male = mysqli_num_rows($active_students_male);
    
    //Get students male aktif :-
    $active_students_female = mysqli_query($con, "SELECT st.*,sr.* FROM students st 
                     RIGHT JOIN student_register sr ON st.st_id=sr.sr_id
                     WHERE st.gender='Perempuan' and sr.academic_year='$year' and sr.term='$term'
                     ");
    $rs_active_students_female = mysqli_num_rows($active_students_female);
                
?>

<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span>  SISTEM PELAPORAN</p>
    <small>Laporan  <cite title="Source Title">Terkini</cite></small>
    <p class="text-info">JUMLAH MAHASISWA</p>
    <p class="text-capitalize"><b>- Total mahasiswa :</b> <?= $total_student_data ?> Org</p>
    <p class="text-capitalize"><b>- Total mahasiswa lelaki :</b> <?= $total_student_data_male ?> Org</p>
    <p class="text-capitalize"><b>- Total mahasiswa perempuan :</b> <?= $total_student_data_female ?> Org</p>
    <hr>
    <p class="text-info">JUMLAH MAHASISWA AKTIF</p>
    <p class="text-capitalize"><b>- Total Mahasiswa Yang Aktif :</b> <?= $rs_active_students ?> Org</p>
    <p class="text-capitalize"><b>- Total Mahasiswa Lelaki Yang Aktif :</b> <?= $rs_active_students_male ?> Org</p>
    <p class="text-capitalize"><b>- Total Mahasiswa Perempuan Yang Aktif :</b> <?= $rs_active_students_female ?> Org</p>
    <hr>
</blockquote>