<?php

    $st_id = $_GET['id'];
    $gender = $_GET['gender'];
        
        //Class process 
        
        //If gender is male (A B C D E F)
        if($gender == 'Lelaki'){
            $sqlMaleA = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='A'");
            $rsSqlMaleA = mysqli_fetch_array($sqlMaleA);
            $maleA = $rsSqlMaleA['max'];
            
            if($maleA == ''){
                $testClassSet = 'A';
                $testNumberSet = 1;
            }elseif($maleA <= 2){
                $testClassSet = 'A';
                $testNumberSet = $maleA+1;
            }else{
                $sqlMaleB = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='B'");
                $rsSqlMaleB = mysqli_fetch_array($sqlMaleB);
                $maleB = $rsSqlMaleB['max'];
                if($maleB == ''){
                    $testClassSet = 'B';
                    $testNumberSet = 1;
                }elseif($maleB <= 2){
                    $testClassSet = 'B';
                    $testNumberSet = $maleB+1;
                }else{
                    $sqlMaleC = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='C'");
                    $rsSqlMaleC = mysqli_fetch_array($sqlMaleC);
                    $maleC = $rsSqlMaleC['max'];
                    if($maleC == ''){
                        $testClassSet = 'C';
                        $testNumberSet = 1;
                    }elseif($maleC <= 2){
                        $testClassSet = 'C';
                        $testNumberSet = $maleC+1;
                    }else{
                        $sqlMaleD = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='D'");
                        $rsSqlMaleD = mysqli_fetch_array($sqlMaleD);
                        $maleD = $rsSqlMaleD['max'];
                        if($maleD == ''){
                            $testClassSet = 'D';
                            $testNumberSet = 1;
                            }elseif($maleD <= 2){
                                $testClassSet = 'D';
                                $testNumberSet = $maleD+1;
                        }else{
                            $sqlMaleE = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='E'");
                            $rsSqlMaleE = mysqli_fetch_array($sqlMaleE);
                            $maleE = $rsSqlMaleE['max'];
                            if($maleE == ''){
                                $testClassSet = 'E';
                                $testNumberSet = 1;
                                }elseif($maleE <= 2){
                                    $testClassSet = 'E';
                                    $testNumberSet = $maleE+1;
                            }else{
                                $sqlMaleF = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='F'");
                                $rsSqlMaleF = mysqli_fetch_array($sqlMaleF);
                                $maleF = $rsSqlMaleF['max'];
                                if($maleF == ''){
                                    $testClassSet = 'F';
                                    $testNumberSet = 1;
                                    }elseif($maleF <= 2){
                                        $testClassSet = 'F';
                                        $testNumberSet = $maleF+1;
                                }else{
?>
                                    <script>
                                        alert("Penuh quata");
                                    </script>
                                    <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">
<?php
                                }
                            }
                        }
                    }
                }
             }
             //Update pretest data table
             $PRETEST = mysqli_query($con, "UPDATE pretest SET testClass='$testClassSet',testNumber='$testNumberSet',payStatus='1' WHERE st_id='$st_id'");
?>
             <script>
                alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
             </script>
             <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">      
<?php
        //break;
        //If gender is female    
        }else{
            $sqlFemaleG = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='G'");
            $rsSqlFemaleG = mysqli_fetch_array($sqlFemaleG);
            $femaleG = $rsSqlFemaleG['max'];
            
            //Class G
            if($femaleG == ''){
                $testClassSet = 'G';
                $testNumberSet = 1;
                }elseif($femaleG <= '5'){
                    $testClassSet = 'G';
                    $testNumberSet = $femaleG+1;
            // Class  H  
            }else{
            $sqlFemaleH = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='H'");
            $rsSqlFemaleH = mysqli_fetch_array($sqlFemaleH);
            $femaleH = $rsSqlFemaleH['max'];
                if($femaleH == ''){
                    $testClassSet = 'H';
                    $testNumberSet = 1;
                    }elseif($femaleH <= '2'){
                        $testClassSet = 'H';
                        $testNumberSet = $femaleH+1;
                //Class I
                }else{
                    $sqlFemaleI = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='I'");
                    $rsSqlFemaleI = mysqli_fetch_array($sqlFemaleI);
                    $femaleI = $rsSqlFemaleI['max'];
                    if($femaleI == ''){
                        $testClassSet = 'I';
                        $testNumberSet = 1;
                        }elseif($femaleI <= '2'){
                        $testClassSet = 'I';
                        $testNumberSet = $femaleI+1;
                    //Class I
                    }else{
                        $sqlFemaleJ = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='J'");
                        $rsSqlFemaleJ = mysqli_fetch_array($sqlFemaleJ);
                        $femaleJ = $rsSqlFemaleJ['max'];
                        if($femaleJ == ''){
                            $testClassSet = 'J';
                            $testNumberSet = 1;
                            }elseif($femaleJ <= '2'){
                            $testClassSet = 'J';
                            $testNumberSet = $femaleJ+1;
                        //Class K
                        }else{
                            $sqlFemaleK = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='K'");
                            $rsSqlFemaleK = mysqli_fetch_array($sqlFemaleK);
                            $femaleK = $rsSqlFemaleK['max'];
                            if($femaleK == ''){
                                $testClassSet = 'K';
                                $testNumberSet = 1;
                                }elseif($femaleK <= '2'){
                                $testClassSet = 'K';
                                $testNumberSet = $femaleK+1;
                            //Class K
                            }else{
                                $sqlFemaleL = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='L'");
                                $rsSqlFemaleL = mysqli_fetch_array($sqlFemaleL);
                                $femaleL = $rsSqlFemaleL['max'];
                                if($femaleL == ''){
                                    $testClassSet = 'L';
                                    $testNumberSet = 1;
                                    }elseif($femaleL <= '2'){
                                    $testClassSet = 'L';
                                    $testNumberSet = $femaleL+1;
                                //Class M
                                }else{
                                    $sqlFemaleM = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='M'");
                                    $rsSqlFemaleM = mysqli_fetch_array($sqlFemaleM);
                                    $femaleM = $rsSqlFemaleM['max'];
                                    if($femaleM == ''){
                                        $testClassSet = 'M';
                                        $testNumberSet = 1;
                                        }elseif($femaleM <= '2'){
                                        $testClassSet = 'M';
                                        $testNumberSet = $femaleM+1;
                                    //Class N
                                    }else{
                                        $sqlFemaleN = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='N'");
                                        $rsSqlFemaleN = mysqli_fetch_array($sqlFemaleN);
                                        $femaleN = $rsSqlFemaleN['max'];
                                        if($femaleN == ''){
                                            $testClassSet = 'N';
                                            $testNumberSet = 1;
                                            }elseif($femaleN <= '2'){
                                            $testClassSet = 'N';
                                            $testNumberSet = $femaleN+1;
                                        //Class O
                                        }else{
                                            $sqlFemaleO = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='O'");
                                            $rsSqlFemaleO = mysqli_fetch_array($sqlFemaleO);
                                            $femaleO = $rsSqlFemaleO['max'];
                                            if($femaleO == ''){
                                                $testClassSet = 'O';
                                                $testNumberSet = 1;
                                                }elseif($femaleO <= '2'){
                                                $testClassSet = 'O';
                                                $testNumberSet = $femaleO+1;
                                            //Class P
                                            }else{
                                                $sqlFemaleP = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='P'");
                                                $rsSqlFemaleP = mysqli_fetch_array($sqlFemaleP);
                                                $femaleP = $rsSqlFemaleP['max'];
                                                if($femaleP == ''){
                                                    $testClassSet = 'P';
                                                    $testNumberSet = 1;
                                                    }elseif($femaleP <= '2'){
                                                    $testClassSet = 'P';
                                                    $testNumberSet = $femaleP+1;
                                                //Class Q
                                                }else{
                                                    $sqlFemaleQ = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='Q'");
                                                    $rsSqlFemaleQ = mysqli_fetch_array($sqlFemaleQ);
                                                    $femaleQ = $rsSqlFemaleQ['max'];
                                                    if($femaleQ == ''){
                                                        $testClassSet = 'Q';
                                                        $testNumberSet = 1;
                                                        }elseif($femaleQ <= '2'){
                                                        $testClassSet = 'Q';
                                                        $testNumberSet = $femaleQ+1;
                                                    //Class R
                                                    }else{
                                                        $sqlFemaleR = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='R'");
                                                        $rsSqlFemaleR = mysqli_fetch_array($sqlFemaleR);
                                                        $femaleR = $rsSqlFemaleR['max'];
                                                        if($femaleR == ''){
                                                            $testClassSet = 'R';
                                                            $testNumberSet = 1;
                                                            }elseif($femaleR <= '2'){
                                                            $testClassSet = 'R';
                                                            $testNumberSet = $femaleR+1;
                                                        //Class S
                                                        }else{
                                                            $sqlFemaleS = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='S'");
                                                            $rsSqlFemaleS = mysqli_fetch_array($sqlFemaleS);
                                                            $femaleS = $rsSqlFemaleS['max'];
                                                            if($femaleS == ''){
                                                                $testClassSet = 'S';
                                                                $testNumberSet = 1;
                                                                }elseif($femaleS <= '2'){
                                                                $testClassSet = 'S';
                                                                $testNumberSet = $femaleS+1;
                                                            //Class T
                                                            }else{
                                                                $sqlFemaleT = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='T'");
                                                                $rsSqlFemaleT = mysqli_fetch_array($sqlFemaleT);
                                                                $femaleT = $rsSqlFemaleT['max'];
                                                                if($femaleT == ''){
                                                                    $testClassSet = 'T';
                                                                    $testNumberSet = 1;
                                                                    }elseif($femaleT <= '2'){
                                                                    $testClassSet = 'T';
                                                                    $testNumberSet = $femaleT+1;
                                                                //Class U
                                                                }else{
                                                                    $sqlFemaleU = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='U'");
                                                                    $rsSqlFemaleU = mysqli_fetch_array($sqlFemaleU);
                                                                    $femaleU = $rsSqlFemaleU['max'];
                                                                    if($femaleU == ''){
                                                                        $testClassSet = 'U';
                                                                        $testNumberSet = 1;
                                                                        }elseif($femaleU <= '2'){
                                                                        $testClassSet = 'U';
                                                                        $testNumberSet = $femaleU+1;
                                                                    }else{
?>
                                                                        <script>
                                                                            alert("Penuh quata");
                                                                        </script>
                                                                        <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">
<?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //Update pretest data table
            $PRETEST = mysqli_query($con, "UPDATE pretest SET
                                     testClass = '$testClassSet',
                                     testNumber = '$testNumberSet',
                                     payStatus = '1'
                                     WHERE st_id='$st_id'   
                                     ");
?>
             <script>
                alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
             </script>
             <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">                                                                   
<?php                                                                        
        }
            
?>               
