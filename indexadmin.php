<?php
    require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TraiNFC</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" 
            type="text/css" />

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <?php
        if(empty($_SESSION['login']))
            header('Location: signin.php');
    ?>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">TraiNFC</a>                                    
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#page-top">Home</a>
                    </li>
                    <?php
                        if(!empty($_SESSION['username']) && $_SESSION['level'] == 0)
                        {
                    ?>
                    <li>
                        <a class="page-scroll" href="#about">My Account</a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php
                        if(!empty($_SESSION['username']) && $_SESSION['level'] == 0)
                        {
                    ?>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php
                        if(!empty($_SESSION['username']) && $_SESSION['level'] == 0)
                        {
                    ?>
                    <li>
                        <a class="page-scroll" href="#topup">Top Up</a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php
                        if(!empty($_SESSION['username']) && $_SESSION['level'] == 1)
                        {
                    ?>
                    <li>
                        <a class="page-scroll" href="#topuplist">Top Up List</a>
                    </li>
                    <?php
                        }
                    ?>
                    <li>
                        <a class="page-scroll" href="signout_prtcl.php">Sign Out</a>
                    </li>
                </ul>                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>    
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h3 id="homeHeading">Hi,</h3>
                <h1 id="homeHeading"><?php echo $_SESSION['username']; ?></h1>
                <hr>
                <p><strong>TraiNFC</strong> is a simple solution to the complexity of train ticketing. Through <strong>TraiNFC</strong>, a simple ticketing way of life is not only a dream. Just tap and go. Hopefully this little solution can give great impacts for a better <strong>Indonesia</strong></p>
                <?php
                    if(!empty($_SESSION['username']) && $_SESSION['level'] == 0)
                    {
                ?>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">My Account</a>
                <?php } ?>
                <?php
                    if(!empty($_SESSION['username']) && $_SESSION['level'] == 1)
                    {
                ?>
                <a href="#topuplist" class="btn btn-primary btn-xl page-scroll">Top Up List</a>
                <?php } ?>
            </div>
        </div>
    </header>
    <?php
        if(!empty($_SESSION['username']) && $_SESSION['level'] == 0)
        {
    ?>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">My account</h2>
                    <hr class="light">                        
                        <div class="col-lg-12">
                            <i class="fa fa-5x fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-12">
                            <h3><strong>Username : </strong> <?php echo $_SESSION['username']; ?> </h3>
                            <h3><strong>Email : </strong> <?php echo $_SESSION['email']; ?> </h3>
                            <h3><strong>Phone : </strong> <?php echo $_SESSION['no_hp']; ?> </h3>
                            <h3><strong>Balance : </strong> Rp <?php echo $_SESSION['saldo']; ?> </h3>
                        </div>
                    <a href="#topup" class="page-scroll btn btn-default btn-xl sr-button">Balance Top Up</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p><h2 class="section-heading text-jdl">Our Services</h2></p>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-train text-primary sr-icons"></i>
                        <h3 class="text-jdl">Ease of access</h3>
                        <p class="text-muted"><strong>TraiNFC</strong> is available in all stations around JABODETABEK</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-fast-forward text-primary sr-icons"></i>
                        <h3 class="text-jdl">Fast and reliable</h3>
                        <p class="text-muted"><strong>TraiNFC</strong> is extremely fast</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-lock text-primary sr-icons"></i>
                        <h3 class="text-jdl">Secure</h3>
                        <p class="text-muted">It's our obligation to keep your privacy confidential</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-mobile text-primary sr-icons"></i>
                        <h3 class="text-jdl">Tap and Go</h3>
                        <p class="text-muted">No card, no money, just <strong>Tap, and Go</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    <?php
        if(!empty($_SESSION['username']) && $_SESSION['level'] == 0)
        {
    ?>
    <section class="bg-primary" id="topup">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Top Up</h2>
                    <hr class="light">                        
                        <div class="col-lg-12">
                            <i class="fa fa-5x fa-money" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-12">
                            <?php
                                $query = 'SELECT * 
                                          FROM topup
                                          WHERE id_user ="'.$_SESSION['id_user'].'" AND id_statustrx = 0 OR id_statustrx = 1';

                                $result = mysql_query($query);
                                
                                if(mysql_num_rows($result))
                                {
                                    $row = mysql_fetch_assoc($result);
                            ?>
                                    <p>Please make your payment to</p>
                                    <br />
                                    <p>Bank Account : BNI</p>
                                    <br />
                                    <p>Bank Account No : 021778778</p>
                                    <br />
                                    <p>Amount : <?php echo $row['jml_topup']; ?></p>
                                    <br />
                                    <?php 
                                        echo '<a href="cancel_prtcl.php?f='.$row['id_topup'].'" class="page-scroll btn btn-default btn-xl sr-button">Cancel</a>';
                                    ?>
                                    <?php 
                                        echo '<a href="verify_prtcl.php?f='.$row['id_topup'].'" class="page-scroll btn btn-default btn-xl sr-button">Verify</a>';
                                    ?>                                    
                            <?php
                                }
                                else
                                {
                            ?>
                            <form method="POST" action="topup_prtcl.php" enctype="multipart/form-data">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Bank account" name="nama_rek" id="nama_rek" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Bank account number" max="40" name="no_rek" id="no_rek" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Topup amount" name="jml_topup" id="jml_topup" required/>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" id="btn_topupreq" class="page-scroll btn btn-default btn-xl sr-button">Top up</button>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </form>
                            <?php
                                }
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    <!---->
    <?php
        if(!empty($_SESSION['username']) && $_SESSION['level'] == 1)
        {
    ?>
    <section id="topuplist">
        <h1 class="text-jdl"><center> TOPUP LIST</center></h1>
        <hr />
        <br />
    <table rules="rows">
    <thead>
        <tr>
            <!--<th>ID TOPUP</th>-->
            <th>USERNAME</th>
            <th>BALANCE</th>
            <th>TOPUP AMOUNT</th>            
            <th>BANK ACCOUNT NO</th>
            <th>BANK ACCOUNT</th>
            <th>DATE</th>
            <th>TRANSACTION STATUS</th>
            <th colspan="2">ACTION</th>             
        </tr>
        </thead>
        <tbody>
        <?php
        
            $query = 'SELECT * from topup as t inner join user as u on 
                     t.id_user=u.id_user inner join refstatustrx as s  on
                      t.id_statustrx=s.id_statustrx';

            $result = mysql_query($query);
            
             

            while($row = mysql_fetch_object($result)){
                echo '
                    <tr>
                        <!--<td>'.$row->id_topup.'</td>-->
                        <td>'.$row->username.'</td>
                       <td>Rp. '.number_format($row->saldo, 0, '', '.').'</td>
                        <td>Rp. '.number_format($row->jml_topup, 0, '', '.').'</td>                        
                        <td>'.$row->no_rek.'</td>
                        <td>'.$row->nama_rek.'</td>
                        <td>'.$row->tgl.'</td>
                        <td>'.$row->statustrx.'</td>
                        ';
                        if($row->id_statustrx == 1)
                            echo '<td>
                                <a href="addtopup_prtcl.php?t='.$row->id_topup.'" onclick="if(! confirm(\'Add balance?\')) return false;">TopUp</a>
                            </td>';
                        else
                            echo '<td></td>';
                        echo '<td>
                            <a href="deletetopup_prtcl.php?t='.$row->id_topup.'" onclick="if(! confirm(\'Are you sure?\')) return false;">Delete</a>
                        </td>
                    </tr>';
                    //$tambah = $row->jml_topup +$row->saldo;
            }

            if(mysql_num_rows($result) <= 0){
                echo '
                <tr>
                    <td colspan="5" align="center">Data is empty</td>
                    
                </tr>';
            }
        ?>
        </center>
        </tbody>
    </table>
    
    </section>
    <?php
        }
    ?>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/mvalidation.js"></script>
    <!-- Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
