        <div class='pull-left'>
            <span class="glyphicon glyphicon-option-vertical"></span> <b>SISTEM DUL</b>
        </div>
        <div class='pull-right'>
            <a href="?page=dol&&dolpage=main" class='btn btn-success btn-sm'><span class='glyphicon glyphicon-list'></span> SEMUA</a>
            <a href="?page=dol&&search=list&&dolpage=list" class='btn btn-success btn-sm'><span class='glyphicon glyphicon-list'></span> DAFTAR DUL</a>
        </div>
        <br>
        <hr>
        <?php
            $search = $_GET['search']; // To get the page
            if($search == 'list'){
        ?>
        <!-- Search box -->
        <div class="pull-right">
                <form class="navbar-form" role="search" action="?page=dol&&search=list&&dolpage=listSearch" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="q" required>
                    <div class="input-group-btn">
                        <button class="btn btn-success btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                    </div>
                </form>
        </div>
        <?php
            }else{
        ?>
        <!-- Search box -->
        <p>
            <div class="pull-right">
                    <form class="navbar-form" role="search" action="?page=dol&&dolpage=search" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="q" required>
                        <div class="input-group-btn">
                            <button class="btn btn-success btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                        </div>
                    </form>
            </div>
        <p/>
        <?php
            }
        ?>
        <?php
        $dolpage = $_GET['dolpage']; // To get the page
            switch ($dolpage) {
                case 'main':
                    include 'module/dol/main.php';
                    break;
                case 'search':
                    include 'module/dol/search.php';
                    break;
                case 'query':
                    include 'module/dol/query.php';
                    break;
                case 'dulRegister':
                    include 'module/dol/dulRegister.php';
                    break;
                case 'list':
                    include 'module/dol/list.php';
                    break;
                case 'listSearch':
                    include 'module/dol/listSearch.php';
                    break;
                case 'subjectList':
                    include 'module/dol/subjectList.php';
                    break;
                case 'listDelete':
                    include 'module/dol/listDelete.php';
                    break;
                case 'scoreSave':
                    include 'module/dol/scoreSave.php';
                    break;
            }
        ?>
