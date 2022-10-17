<aside class="sidebar">
    <a class="logo" href="dashboard.php"><img src="images/logo.png"></a>
    <ul>
        <?php
        if($_COOKIE['usertype'] == "Super Admin"){
        ?>
        <li>
            <a href="dashboard.php"><span class="icon-dashboard icon"></span> Dashboard</a>
        </li>
        <?php
        }

        ?>

        <li>
            <a href="customers.php"><span class="icon-customers icon"></span> Customer</a>
        </li>
        <li>
            <a href="orders.php"><span class="icon-orders icon"></span> Order</a>
        </li>
        <li>
            <a href="purchase.php"><span class="icon-purchase icon"></span> Purchased</a>
        </li>
        <?php
        if($_COOKIE['usertype'] == "Super Admin"){
        ?>
        <li>
            <a href="cardBeneficiary.php"><span class="icon-purchase icon"></span>Card Beneficiary</a>
        </li>
        <?php
        }
        ?>
        <?php
        if($_COOKIE['usertype'] == "Super Admin"){
        ?>
        <li>
            <a href="addressBeneficiary.php"><span class="icon-distribution icon"></span>Address Beneficiary</a>
        </li>
        <?php
        }
        ?>


        <li>
            <a href=""><span class="icon-distribution icon"></span> Distribution</a>
        </li>
        <?php
            if($_COOKIE['usertype'] == "Super Admin"){
        ?>
        <li>
            <a href="userAccount.php"><span class="icon-user icon"></span> User Account</a>
        </li>
        <?php
            }
        ?>

    </ul>
</aside>